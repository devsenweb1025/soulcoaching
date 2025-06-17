<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\ApiErrorException;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Mail\OrderConfirmationEmail;
use App\Mail\OrderReceivedEmail;
use App\Notifications\OrderPlaced;
use Illuminate\Support\Facades\Auth;

class CartPaymentController extends Controller
{
    protected $paypalProvider;

    public function __construct()
    {
        // Initialize PayPal
        $this->paypalProvider = new PayPalClient;
        $this->paypalProvider->setApiCredentials(config('paypal'));
        $this->paypalProvider->getAccessToken();
    }

    private function calculateCartTotal()
    {
        $cart = session('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function createPaymentIntent(Request $request)
    {
        try {
            $request->validate([
                'payment_method' => 'required|in:stripe,paypal,twint',
                'guest_info' => 'required_if:is_guest,true|array',
                'guest_info.email' => 'required_if:is_guest,true|email',
                'guest_info.first_name' => 'required_if:is_guest,true|string',
                'guest_info.last_name' => 'required_if:is_guest,true|string',
            ]);

            $cartTotal = $this->calculateCartTotal();
            $shippingCost = (float) session('shipping_cost', 11.5);
            $total = $cartTotal + $shippingCost;

            // Log the values for debugging
            Log::info('Cart Payment Calculation', [
                'cart_total' => $cartTotal,
                'shipping_cost' => $shippingCost,
                'total' => $total
            ]);

            $amount = $total * 100; // Convert to cents

            // Get user info based on auth status
            $userInfo = $this->getUserInfo($request);

            if ($request->payment_method === 'stripe') {
                Stripe::setApiKey(config('services.stripe.secret'));

                $paymentIntent = PaymentIntent::create([
                    'amount' => $amount,
                    'currency' => 'chf',
                    'payment_method_types' => ['card'],
                    'metadata' => [
                        'user_id' => $userInfo['user_id'],
                        'order_type' => 'cart',
                        'is_guest' => $request->is_guest ? 'true' : 'false'
                    ]
                ]);

                return response()->json([
                    'clientSecret' => $paymentIntent->client_secret,
                    'paymentIntentId' => $paymentIntent->id
                ]);
            } elseif ($request->payment_method === 'twint') {
                Stripe::setApiKey(config('services.stripe.secret'));

                // Create a payment intent with TWINT as the payment method
                $paymentIntent = PaymentIntent::create([
                    'amount' => $amount,
                    'currency' => 'chf',
                    'payment_method_types' => ['twint'],
                    'metadata' => [
                        'user_id' => $userInfo['user_id'],
                        'order_type' => 'cart',
                        'is_guest' => $request->is_guest ? 'true' : 'false'
                    ]
                ]);

                // Create a payment method for TWINT
                $paymentMethod = \Stripe\PaymentMethod::create([
                    'type' => 'twint',
                    'billing_details' => [
                        'name' => $userInfo['name'],
                        'email' => $userInfo['email']
                    ]
                ]);

                // Attach the payment method to the payment intent
                $paymentIntent = PaymentIntent::update($paymentIntent->id, [
                    'payment_method' => $paymentMethod->id
                ]);

                // Confirm the payment intent to get the QR code
                $paymentIntent = \Stripe\PaymentIntent::retrieve($paymentIntent->id);
                $paymentIntent->confirm([
                    'return_url' => route('cart.payment.success') . '?payment_method=twint'
                ]);

                // Check if the payment intent requires action and has a QR code
                if ($paymentIntent->status === 'requires_action' &&
                    isset($paymentIntent->next_action) &&
                    isset($paymentIntent->next_action->redirect_to_url) &&
                    isset($paymentIntent->next_action->redirect_to_url->url)) {

                    $redirectUrl = $paymentIntent->next_action->redirect_to_url->url;

                    return response()->json([
                        'redirectUrl' => $redirectUrl,
                        'paymentIntentId' => $paymentIntent->id,
                        'clientSecret' => $paymentIntent->client_secret,
                        'status' => 'requires_action'
                    ]);
                }

                return response()->json([
                    'error' => 'QR-Code konnte nicht generiert werden. Bitte versuchen Sie es später erneut.',
                    'status' => 'error'
                ], 400);
            } else {
                // PayPal payment
                $order = [
                    "intent" => "CAPTURE",
                    "purchase_units" => [
                        [
                            "invoice_id" => uniqid('CART-'),
                            "amount" => [
                                "currency_code" => "CHF",
                                "value" => number_format($total, 2, '.', ''),
                            ],
                            "description" => "Warenkorb Bestellung"
                        ]
                    ],
                    "application_context" => [
                        "return_url" => route('cart.payment.success'),
                        "cancel_url" => route('cart.payment.cancel'),
                        "user_action" => "PAY_NOW"
                    ]
                ];

                $response = $this->paypalProvider->createOrder($order);

                if (isset($response['id']) && $response['id'] != null) {
                    foreach ($response['links'] as $links) {
                        if ($links['rel'] == 'approve') {
                            return response()->json([
                                'orderId' => $response['id'],
                                'approvalUrl' => $links['href'],
                            ]);
                        }
                    }
                }

                return response()->json(['error' => 'Erstellung der PayPal-Bestellung fehlgeschlagen'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Cart Payment Error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getUserInfo(Request $request)
    {
        if (auth()->check()) {
            return [
                'user_id' => auth()->id(),
                'name' => auth()->user()->first_name . ' ' . auth()->user()->last_name,
                'email' => auth()->user()->email
            ];
        }

        // Guest user
        return [
            'user_id' => null,
            'name' => $request->guest_info['first_name'] . ' ' . $request->guest_info['last_name'],
            'email' => $request->guest_info['email']
        ];
    }

    public function handleSuccess(Request $request)
    {
        try {
            $paymentMethod = $request->input('payment_method');

            if ($paymentMethod === 'stripe') {
                $paymentIntentId = $request->input('payment_intent');
                Stripe::setApiKey(config('services.stripe.secret'));
                $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

                if ($paymentIntent->status !== 'succeeded') {
                    return redirect()->route('cart.checkout')
                        ->with('error', 'Zahlung war nicht erfolgreich');
                }

                $this->createOrder('stripe', $paymentIntent->id, $paymentIntent->metadata->is_guest === 'true');
            } elseif ($paymentMethod === 'twint') {
                $paymentIntentId = $request->input('payment_intent');
                Stripe::setApiKey(config('services.stripe.secret'));
                $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

                if ($paymentIntent->status !== 'succeeded') {
                    return redirect()->route('cart.checkout')
                        ->with('error', 'TWINT Zahlung war nicht erfolgreich');
                }

                $this->createOrder('twint', $paymentIntent->id, $paymentIntent->metadata->is_guest === 'true');
            } else {
                // PayPal success handling
                $provider = $this->paypalProvider;
                $response = $provider->capturePaymentOrder($request->token);

                if (isset($response['status']) && $response['status'] === 'COMPLETED') {
                    $this->createOrder('paypal', $response['id'], false);
                } else {
                    return redirect()->route('cart.checkout')
                        ->with('error', 'Zahlung war nicht erfolgreich');
                }
            }

            return redirect()->route('cart.success')
                ->with('success', 'Zahlung war erfolgreich. Sie erhalten demnächst eine Bestätigungsmail.');
        } catch (\Exception $e) {
            Log::error('Cart Payment Success Error: ' . $e->getMessage());
            return redirect()->route('cart.checkout')
                ->with('error', 'Es kam zu einem Fehler während der Verarbeitung Ihrer Zahlung. Bitte kontaktieren Sie uns.');
        }
    }

    private function createOrder($paymentMethod, $transactionId, $isGuest = false)
    {
        try {
            DB::beginTransaction();

            $user = auth()->user();
            $cartTotal = $this->calculateCartTotal();
            $shippingCost = (float) session('shipping_cost', 11.5);
            $total = $cartTotal + $shippingCost;

            // Create order
            $order = Order::create([
                'user_id' => $isGuest ? null : $user->id,
                'order_number' => 'CART-' . strtoupper(uniqid()),
                'status' => 'completed',
                'payment_status' => 'completed',
                'payment_method' => $paymentMethod,
                'payment_id' => $transactionId,
                'total' => $total,
                'subtotal' => $cartTotal,
                'tax' => 0, // Since tax is included in item prices
                'shipping_cost' => $shippingCost,
                'shipping_first_name' => session('shipping_info.first_name'),
                'shipping_last_name' => session('shipping_info.last_name'),
                'shipping_email' => session('shipping_info.email'),
                'shipping_phone' => session('shipping_info.phone'),
                'shipping_address' => session('shipping_info.address'),
                'shipping_city' => session('shipping_info.city'),
                'shipping_postal_code' => session('shipping_info.postal_code'),
                'shipping_country' => session('shipping_info.country'),
            ]);

            // Create order items
            $cart = session('cart', []);
            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_type' => 'product',
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'name' => $item['name'],
                    'options' => []
                ]);
            }

            // Clear cart and shipping info
            session()->forget(['cart', 'shipping_info']);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function handleCancel()
    {
        return redirect()->route('cart.checkout')
            ->with('error', 'Zahlung wurde abgebrochen');
    }
}

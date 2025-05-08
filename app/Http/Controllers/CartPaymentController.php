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
use Gloudemans\Shoppingcart\Facades\Cart;

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

    public function createPaymentIntent(Request $request)
    {
        try {
            $request->validate([
                'payment_method' => 'required|in:stripe,paypal,twint'
            ]);

            $total = (float) Cart::total(null, '.', '') + (float) session('shipping_cost', 11.5);
            $amount = $total * 100; // Convert to cents

            if ($request->payment_method === 'stripe') {
                Stripe::setApiKey(config('services.stripe.secret'));

                $paymentIntent = PaymentIntent::create([
                    'amount' => $amount,
                    'currency' => 'chf',
                    'payment_method_types' => ['card'],
                    'metadata' => [
                        'user_id' => auth()->id(),
                        'order_type' => 'cart'
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
                        'user_id' => auth()->id(),
                        'order_type' => 'cart'
                    ]
                ]);

                // Create a payment method for TWINT
                $paymentMethod = \Stripe\PaymentMethod::create([
                    'type' => 'twint',
                    'billing_details' => [
                        'name' => auth()->user()->first_name . ' ' . auth()->user()->last_name,
                        'email' => auth()->user()->email
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

                // If no QR code is available, return an error
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

                $this->createOrder('stripe', $paymentIntent->id);
            } elseif ($paymentMethod === 'twint') {
                $paymentIntentId = $request->input('payment_intent');
                Stripe::setApiKey(config('services.stripe.secret'));
                $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

                if ($paymentIntent->status !== 'succeeded') {
                    return redirect()->route('cart.checkout')
                        ->with('error', 'TWINT Zahlung war nicht erfolgreich');
                }

                $this->createOrder('twint', $paymentIntent->id);
            } else {
                // PayPal success handling
                $provider = $this->paypalProvider;
                $response = $provider->capturePaymentOrder($request->token);

                if (isset($response['status']) && $response['status'] === 'COMPLETED') {
                    $this->createOrder('paypal', $response['id']);
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

    private function createOrder($paymentMethod, $transactionId)
    {
        try {
            DB::beginTransaction();

            $user = auth()->user();
            $total = (float) Cart::total(null, '.', '') + (float) session('shipping_cost', 11.5);

            // Create order
            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => 'CART-' . strtoupper(uniqid()),
                'status' => 'completed',
                'payment_status' => 'completed',
                'payment_method' => $paymentMethod,
                'payment_id' => $transactionId,
                'total' => $total,
                'subtotal' => Cart::subtotal(null, '.', ''),
                'tax' => Cart::tax(null, '.', ''),
                'shipping_cost' => session('shipping_cost', 11.5),
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
            foreach (Cart::content() as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'product_type' => $item->options->type ?? 'product',
                    'quantity' => $item->qty,
                    'price' => $item->price,
                    'name' => $item->name,
                    'options' => $item->options->toArray()
                ]);
            }

            // Send order confirmation email
            Mail::to($user->email)->send(new OrderConfirmationEmail($order));

            // Send order received email to admin
            try {
                Mail::to(config('mail.admin_email'))->send(new OrderReceivedEmail($order));
            } catch (\Exception $e) {
                Log::error('Error sending order received email: ' . $e->getMessage());
            }

            // Send notification
            $user->notify(new OrderPlaced($order));

            // Clear cart
            Cart::destroy();
            session()->forget('shipping_info');

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

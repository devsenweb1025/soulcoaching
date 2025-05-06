<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Shipping;
use App\Models\Transaction as TransactionModel;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    protected $paypalProvider;

    public function __construct()
    {
        // Initialize PayPal
        $this->paypalProvider = new PayPalClient;
        $this->paypalProvider->setApiCredentials(config('paypal'));
        $this->paypalProvider->getAccessToken();
    }

    public function createPayPalPayment(Request $request)
    {
        try {
            // Get shipping information from session
            $shippingInfo = session('shipping_info');
            if (!$shippingInfo) {
                return redirect()->route('cart.checkout')
                    ->with('error', 'Versandinformationen wurden nicht gefunden. Bitte die Versandinformationen eingeben');
            }

            // Get cart from session
            $cart = session('cart', []);
            if (empty($cart)) {
                return redirect()->route('cart.checkout')
                    ->with('error', 'Ihr Warenkorb ist leer.');
            }

            // Calculate totals
            $subtotal = 0;
            foreach ($cart as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }
            $shippingCost = session('shipping_cost', 11.50);
            $total = $subtotal + $shippingCost;

            // Create PayPal order
            $provider = $this->paypalProvider;

            $order = [
                "intent" => "CAPTURE",
                "purchase_units" => [
                    [
                        "invoice_id" => uniqid('ORDER-'),
                        "amount" => [
                            "currency_code" => "CHF",
                            "value" => number_format($total, 2, '.', ''),
                            "breakdown" => [
                                "item_total" => [
                                    "currency_code" => "CHF",
                                    "value" => number_format($subtotal, 2, '.', '')
                                ],
                                "shipping" => [
                                    "currency_code" => "CHF",
                                    "value" => number_format($shippingCost, 2, '.', '')
                                ],
                            ]
                        ],
                        "items" => array_map(function ($item) {
                            return [
                                "name" => $item['name'],
                                "unit_amount" => [
                                    "currency_code" => "CHF",
                                    "value" => number_format($item['price'], 2, '.', '')
                                ],
                                "quantity" => (string) $item['quantity'],
                                "sku" => $item['options']['sku'] ?? null
                            ];
                        }, array_values($cart)),
                        "shipping" => [
                            "name" => [
                                "full_name" => $shippingInfo['first_name'] . ' ' . $shippingInfo['last_name']
                            ],
                            "address" => [
                                "address_line_1" => $shippingInfo['address'],
                                "admin_area_2" => $shippingInfo['city'],
                                "postal_code" => $shippingInfo['postal_code'],
                                "country_code" => $shippingInfo['country']
                            ]
                        ]
                    ]
                ],
                "application_context" => [
                    "return_url" => route('payment.paypal.success'),
                    "cancel_url" => route('payment.paypal.cancel'),
                    "user_action" => "PAY_NOW",
                    "shipping_preference" => "SET_PROVIDED_ADDRESS"
                ]
            ];

            $response = $provider->createOrder($order);

            if (isset($response['id']) && $response['id'] != null) {
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return response()->json([
                            'orderId' => $response['id'],
                            'approvalUrl' => $links['href'],
                        ]);
                    }
                }
                return redirect()
                    ->route('cart.checkout')
                    ->with('error', 'Etwas lief schief mit PayPal.');
            } else {
                return redirect()
                    ->route('cart.checkout')
                    ->with('error', $response['message'] ?? 'Etwas lief schief mit PayPal.');
            }
        } catch (\Exception $e) {
            \Log::error('PayPal Payment Error: ' . $e->getMessage());
            return redirect()
                ->route('cart.checkout')
                ->with('error', 'Etwas lief schief mit PayPal.');
        }
    }

    public function handlePayPalSuccess(Request $request)
    {
        try {
            $provider = $this->paypalProvider;
            $response = $provider->capturePaymentOrder($request->token);

            if (isset($response['status']) && $response['status'] === 'COMPLETED') {
                // Create order
                $order = $this->createOrder('paypal', $response['id'], $response['status']);

                // Clear cart and shipping info
                session()->forget(['cart', 'shipping_info']);

                // Redirect to success page
                return redirect()->route('cart.checkout.success', ['order' => $order->id])
                    ->with('success', 'Zahlung war erfolgreich');
            }

            return redirect()->route('cart.checkout')
                ->with('error', 'Zahlung war nicht erfolgreich.');
        } catch (\Exception $e) {
            Log::error('PayPal Payment Error: ' . $e->getMessage());
            return redirect()->route('cart.checkout')
                ->with('error', 'Etwas lief schief mit PayPal.');
        }
    }

    public function handlePayPalCancel()
    {
        return redirect()->route('cart.checkout')
            ->with('error', 'Zahlung wurde abgebrochen');
    }

    public function handleSuccess()
    {
        // Get the order from session
        $order = session('order');

        if (!$order) {
            return redirect()->route('shop.index')
                ->with('status', 'error')
                ->with('message', 'Order not found.');
        }

        return view('pages.landing.cart.success', compact('order'))
            ->with('status', 'success')
            ->with('message', 'Die Zahlung war erfolgreich – deine Bestellung ist nun in Bearbeitung.');
    }

    public function handleFailed()
    {
        return view('pages.landing.cart.failed')
            ->with('status', 'error')
            ->with('message', 'Zahlung fehlgeschlagen. Bitte versuche es erneut oder kontaktiere mich');
    }

    private function createOrder($paymentMethod, $transactionId, $status = 'pending'): Order
    {
        try {
            DB::beginTransaction();

            // Get shipping information from session
            $shippingInfo = session()->get('shipping_info');

            // Get cart from session and calculate totals
            $cart = session('cart', []);
            $subtotal = 0;
            foreach ($cart as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }
            $shippingCost = session('shipping_cost', 11.50);
            $total = $subtotal + $shippingCost;

            // Create order
            $order = Order::create([
                'user_id' => auth()->id(), // Will be null for guest orders
                'order_number' => 'ORD-' . strtoupper(Str::random(10)),
                'status' => 'pending',
                'payment_status' => strtolower($status),
                'payment_method' => $paymentMethod,
                'payment_id' => $transactionId,
                'total' => $total,
                'subtotal' => $subtotal,
                'tax' => 0, // Add tax calculation if needed
                'shipping_cost' => $shippingCost,
                'shipping_first_name' => $shippingInfo['first_name'],
                'shipping_last_name' => $shippingInfo['last_name'],
                'shipping_email' => $shippingInfo['email'],
                'shipping_phone' => $shippingInfo['phone'],
                'shipping_address' => $shippingInfo['address'],
                'shipping_city' => $shippingInfo['city'],
                'shipping_state' => $shippingInfo['state'] ?? '',
                'shipping_postal_code' => $shippingInfo['postal_code'],
                'shipping_country' => $shippingInfo['country']
            ]);

            // Create order items
            foreach ($cart as $id => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'options' => json_encode($item['options'] ?? [])
                ]);

                // Update product quantity
                $product = Product::find($id);
                if ($product) {
                    $product->decrement('quantity', $item['quantity']);
                }
            }

            DB::commit();
            return $order;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Order Creation Error: ' . $e->getMessage());
            throw $e;
        }
    }
}

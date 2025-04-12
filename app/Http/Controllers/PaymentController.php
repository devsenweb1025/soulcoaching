<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Cart;
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
                    ->with('error', 'Shipping information not found. Please fill in the shipping details.');
            }

            // Create PayPal order
            $provider = $this->paypalProvider;
            $cart = Cart::content();
            $total = Cart::total();

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
                                    "value" => number_format(Cart::subtotal(), 2, '.', '')
                                ],
                                "tax_total" => [
                                    "currency_code" => "CHF",
                                    "value" => number_format(Cart::tax(), 2, '.', '')
                                ]
                            ]
                        ],
                        "items" => $cart->map(function ($item) {
                            return [
                                "name" => $item->name,
                                "unit_amount" => [
                                    "currency_code" => "CHF",
                                    "value" => number_format($item->price, 2, '.', '')
                                ],
                                "quantity" => (string)$item->qty,
                                "sku" => $item->options->sku ?? null
                            ];
                        })->toArray(),
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
            dd($response);

            if (isset($response['id']) && $response['id'] != null) {
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }
                return redirect()
                    ->route('cart.checkout')
                    ->with('error', 'Something went wrong with PayPal.');
            } else {
                return redirect()
                    ->route('cart.checkout')
                    ->with('error', $response['message'] ?? 'Something went wrong with PayPal.');
            }
        } catch (\Exception $e) {
            \Log::error('PayPal Payment Error: ' . $e->getMessage());
            return redirect()
                ->route('cart.checkout')
                ->with('error', 'Something went wrong with PayPal. Please try again.');
        }
    }

    public function handlePayPalSuccess(Request $request)
    {
        try {
            $provider = $this->paypalProvider;
            $response = $provider->capturePaymentOrder($request->token);

            if (isset($response['status']) && $response['status'] === 'COMPLETED') {
                // Create order
                $order = $this->createOrder('paypal', $response['id']);

                // Clear cart
                Cart::destroy();

                // Redirect to success page
                return redirect()->route('payment.success')
                    ->with('success', 'Payment completed successfully.')
                    ->with('order', $order);
            }

            return redirect()->route('cart.checkout')
                ->with('error', 'Payment was not successful.');
        } catch (\Exception $e) {
            return redirect()->route('cart.checkout')
                ->with('error', $e->getMessage());
        }
    }

    public function handlePayPalCancel()
    {
        return redirect()->route('cart.checkout')
            ->with('error', 'Payment was cancelled.');
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
            ->with('message', 'Payment completed successfully! Your order has been processed.');
    }

    public function handleFailed()
    {
        return view('pages.landing.cart.failed')
            ->with('status', 'error')
            ->with('message', 'Payment failed. Please try again or contact support if the problem persists.');
    }

    private function createOrder($paymentMethod, $transactionId, $status = 'pending'): Order
    {
        try {
            DB::beginTransaction();

            // Create order
            $order = Order::create([
                'user_id' => auth()->id(),
                'order_number' => 'ORD-' . strtoupper(Str::random(10)),
                'status' => 'pending',
                'payment_status' => $status,
                'payment_method' => $paymentMethod,
                'transaction_id' => $transactionId,
                'total' => Cart::total(),
                'subtotal' => Cart::subtotal(),
                'tax' => Cart::tax(),
                'shipping_cost' => 0,
                'shipping_info' => session('shipping_info'),
            ]);

            // Create order items
            foreach (Cart::content() as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'name' => $item->name,
                    'price' => $item->price,
                    'quantity' => $item->qty,
                    'options' => $item->options->toArray(),
                ]);
            }

            // Create transaction
            TransactionModel::create([
                'order_id' => $order->id,
                'transaction_id' => $transactionId,
                'payment_method' => $paymentMethod,
                'amount' => Cart::total(),
                'status' => 'completed',
            ]);

            DB::commit();
            return $order;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}

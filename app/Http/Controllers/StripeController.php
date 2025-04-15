<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\ApiErrorException;
use Gloudemans\Shoppingcart\Facades\Cart;

class StripeController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        try {
            // Get shipping information from session
            $shippingInfo = session('shipping_info');

            if (!$shippingInfo) {
                return response()->json([
                    'error' => 'Versandinformationen wurden nicht gefunden. Bitte die Versandinformationen eingeben'
                ], 400);
            }

            Stripe::setApiKey(config('services.stripe.secret'));

            $paymentIntent = PaymentIntent::create([
                'amount' => ((float) Cart::total(null, '.', '') + (float) session('shipping_cost', 11.5)) * 100, // Convert to cents
                'currency' => 'chf',
                'payment_method_types' => ['card'],
                'metadata' => [
                    'user_id' => auth()->id(),
                    'cart_count' => Cart::count(),
                    'shipping_name' => $shippingInfo['first_name'] . ' ' . $shippingInfo['last_name'],
                    'shipping_email' => $shippingInfo['email'],
                    'shipping_phone' => $shippingInfo['phone'],
                    'shipping_address' => $shippingInfo['address'],
                    'shipping_city' => $shippingInfo['city'],
                    'shipping_state' => $shippingInfo['state'] ?? '',
                    'shipping_postal_code' => $shippingInfo['postal_code'],
                    'shipping_country' => $shippingInfo['country']
                ]
            ]);

            return response()->json([
                'clientSecret' => $paymentIntent->client_secret
            ]);
        } catch (ApiErrorException $e) {
            Log::error('Stripe Payment Intent Error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function handleSuccess(Request $request)
    {
        try {
            $paymentIntentId = $request->input('payment_intent');

            if (!$paymentIntentId) {
                return redirect()->route('cart.checkout')->with('error', 'Zahlungsvorgang ungültig');
            }

            Stripe::setApiKey(config('services.stripe.secret'));
            $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

            if ($paymentIntent->status !== 'succeeded') {
                return redirect()->route('cart.checkout')->with('error', 'Zahlung war nicht erfolgreich');
            }

            // Get shipping information from session
            $shippingInfo = session()->get('shipping_info');

            if (!$shippingInfo) {
                return redirect()->route('cart.checkout')->with('error', 'Versandinformation nicht gefunden');
            }

            // Start transaction
            DB::beginTransaction();

            try {
                // Create order
                $order = Order::create([
                    'user_id' => auth()->id(),
                    'order_number' => 'ORD-' . strtoupper(uniqid()),
                    'status' => 'pending',
                    'payment_status' => $paymentIntent->status,
                    'payment_method' => 'stripe',
                    'payment_id' => $paymentIntent->id,
                    'subtotal' => Cart::subtotal(),
                    'tax' => Cart::tax(),
                    'total' => $paymentIntent->amount / 100,
                    'shipping_cost' => session('shipping_cost', 11.50),
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
                $cart = Cart::content()->toArray();
                foreach ($cart as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item['id'],
                        'quantity' => $item['qty'],
                        'price' => $item['price'],
                        'name' => $item['name'],
                        'options' => $item['options'] ?? null
                    ]);

                    // Update product quantity
                    $product = Product::find($item['id']);
                    if ($product) {
                        $product->decrement('quantity', $item['qty']);
                    }
                }

                // Clear cart and shipping info
                Cart::destroy();
                session()->forget(['shipping_info']);

                DB::commit();

                return redirect()->route('cart.checkout.success', ['order' => $order->id])
                    ->with('success', 'Payment successful! Your order has been placed.');
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Order Creation Error: ' . $e->getMessage());
                return redirect()->route('cart.checkout')->with('error', 'Fehler beim erstellen der Bestellung. Bitte melde dich bei mir');
            }
        } catch (ApiErrorException $e) {
            Log::error('Stripe Payment Verification Error: ' . $e->getMessage());
            return redirect()->route('cart.checkout')->with('error', 'Fehler beim verifizieren der Zahlung. Bitte kontaktiere mich');
        }
    }
}

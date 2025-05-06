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

            // Calculate total amount from session cart
            $cart = session('cart', []);
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
            $total += session('shipping_cost', 11.5);

            $paymentIntent = PaymentIntent::create([
                'amount' => $total * 100, // Convert to cents
                'currency' => 'chf',
                'payment_method_types' => ['card'],
                'metadata' => [
                    'user_id' => auth()->id() ?? 'guest',
                    'cart_count' => count($cart),
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
                // Calculate totals from session cart
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
                    'order_number' => 'ORD-' . strtoupper(uniqid()),
                    'status' => 'pending',
                    'payment_status' => $paymentIntent->status,
                    'payment_method' => 'stripe',
                    'payment_id' => $paymentIntent->id,
                    'subtotal' => $subtotal,
                    'tax' => 0, // Add tax calculation if needed
                    'total' => $total,
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
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                        'name' => $item['name'],
                        'options' => json_encode($item['options'] ?? [])
                    ]);

                    // Update product quantity
                    $product = Product::find($id);
                    if ($product) {
                        $product->decrement('quantity', $item['quantity']);
                    }
                }

                // Clear cart and shipping info
                session()->forget(['cart', 'shipping_info']);

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

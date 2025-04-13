<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    public function index()
    {
        return view('pages.landing.cart.index');
    }

    public function add($productId, Request $request)
    {
        try {
            $product = Product::find($productId);

            if (!$product) {
                if ($request->wantsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Produkt nicht gefunden.',
                        'error' => 'Product not found'
                    ], 404);
                }
                return redirect()->back()->with('error', 'Product not found.');
            }

            $quantity = $request->input('quantity', 1);

            // Check if product already exists in cart
            $existingItem = Cart::search(function ($cartItem) use ($productId) {
                return $cartItem->id == $productId;
            })->first();

            if ($existingItem) {
                // Update quantity if product exists
                Cart::update($existingItem->rowId, $existingItem->qty + $quantity);
            } else {
                // Add new item to cart
                Cart::add($product->id, $product->name, $quantity, $product->price, [
                    'slug' => $product->slug,
                    'image' => $product->image,
                    'description' => $product->description
                ], 0);
            }

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Artikel wurde erfolgreich zum Warenkorb hinzugefügt!',
                    'cartCount' => Cart::count(),
                    'cartTotal' => Cart::total(),
                    'itemCount' => $existingItem ? $existingItem->qty + $quantity : $quantity
                ]);
            }

            return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
        } catch (\Exception $e) {
            \Log::error('Cart Add Error: ' . $e->getMessage());

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Fehler beim Hinzufügen zum Warenkorb. Bitte versuchen Sie es erneut.',
                    'error' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Failed to add product to cart.');
        }
    }

    public function update($rowId, Request $request)
    {
        try {
            $quantity = $request->input('quantity');

            // Validate quantity
            if ($quantity < 1) {
                if ($request->wantsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Die Menge muss mindestens 1 betragen.',
                        'error' => 'Invalid quantity'
                    ], 400);
                }
                return redirect()->back()->with('error', 'Quantity must be at least 1.');
            }

            // Update cart item
            Cart::update($rowId, $quantity);
            $item = Cart::get($rowId);

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Warenkorb wurde aktualisiert!',
                    'cartCount' => Cart::count(),
                    'cartTotal' => Cart::total(),
                    'shippingCost' => session('shipping_cost'),
                    'itemTotal' => $item->subtotal,
                    'itemCount' => $item->qty
                ]);
            }

            return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Cart Update Error: ' . $e->getMessage());

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Fehler beim Aktualisieren des Warenkorbs.',
                    'error' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Failed to update cart.');
        }
    }

    public function remove($rowId, Request $request)
    {
        try {
            // Check if item exists in cart
            $item = Cart::get($rowId);
            if (!$item) {
                if ($request->wantsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Artikel nicht im Warenkorb gefunden.',
                        'error' => 'Item not found in cart'
                    ], 404);
                }
                return redirect()->back()->with('error', 'Item not found in cart.');
            }

            // Remove item from cart
            Cart::remove($rowId);

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Artikel wurde aus dem Warenkorb entfernt!',
                    'cartCount' => Cart::count(),
                    'shippingCost' => session('shipping_cost'),
                    'cartTotal' => Cart::total(),
                    'isCartEmpty' => Cart::count() === 0
                ]);
            }

            return redirect()->route('cart.index')->with('success', 'Item removed from cart successfully!');
        } catch (\Exception $e) {
            \Log::error('Cart Remove Error: ' . $e->getMessage());

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Fehler beim Entfernen des Artikels.',
                    'error' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Failed to remove item from cart.');
        }
    }

    public function clear(Request $request)
    {
        try {
            Cart::destroy();

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Warenkorb wurde geleert!',
                    'cartCount' => Cart::count(),
                    'shippingCost' => session('shipping_cost'),
                    'cartTotal' => Cart::total()
                ]);
            }

            return redirect()->route('cart.index')->with('success', 'Cart cleared successfully!');
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Fehler beim Leeren des Warenkorbs.',
                    'error' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Failed to clear cart.');
        }
    }

    public function checkout()
    {
        if (Cart::count() === 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('pages.landing.cart.checkout');
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'country' => 'required|string|max:255',
            'card_number' => 'required|string|max:19',
            'expiry_date' => 'required|string|max:5',
            'cvv' => 'required|string|max:4',
        ]);

        // Simulate payment processing
        $order = [
            'id' => uniqid('ORDER-'),
            'items' => Cart::content(),
            'subtotal' => Cart::subtotal(),
            'tax' => Cart::tax(),
            'total' => Cart::total(),
            'shipping' => $request->only(['first_name', 'last_name', 'email', 'phone', 'address', 'city', 'postal_code', 'country'])
        ];

        // Send confirmation email
        Mail::to($request->email)->send(new OrderConfirmation($order));

        // Clear the cart
        Cart::destroy();

        // Store order in session for success page
        session()->flash('order', $order);

        return redirect()->route('cart.checkout.success');
    }

    public function checkoutSuccess(Request $request)
    {
        $input = $request->all();
        $order = Order::find($input['order']);

        return view('pages.landing.cart.success', [
            'order' => compact('order')
        ]);
    }

    public function storeShippingInfo(Request $request)
    {
        try {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'postal_code' => 'required|string|max:255',
                'country' => 'required|string|max:255',
            ]);

            // Store shipping information in session
            session()->put('shipping_info', [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'country' => $request->country,
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateShipping(Request $request)
    {
        $request->validate([
            'shipping_option' => 'required|in:small,middle,big',
            'shipping_cost' => 'required|numeric|min:0'
        ]);

        // Store shipping option and cost in session
        session(['shipping_option' => $request->shipping_option]);
        session(['shipping_cost' => $request->shipping_cost]);

        return response()->json([
            'success' => true,
            'message' => 'Shipping option updated successfully',
            'shipping_cost' => $request->shipping_cost,
            'total' => Cart::total()
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;
use App\Mail\OrderReceiptMail;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $total = $this->calculateTotal($cart);

        return view('pages.landing.cart.index', [
            'cart' => $cart,
            'total' => $total
        ]);
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
                        'error' => 'Produkt nicht gefunden'
                    ], 404);
                }
                return redirect()->back()->with('error', 'Produkt nicht gefunden.');
            }

            $quantity = $request->input('quantity', 1);
            $cart = session('cart', []);

            // Check if product already exists in cart
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] += $quantity;
            } else {
                $cart[$productId] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'image' => $product->image,
                    'description' => $product->description,
                    'slug' => $product->slug
                ];
            }

            // Update session
            session(['cart' => $cart]);

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Artikel wurde erfolgreich zum Warenkorb hinzugefügt!',
                    'cartCount' => count($cart),
                    'cartTotal' => $this->calculateTotal($cart),
                    'isAuthenticated' => auth()->check()
                ]);
            }

            return redirect()->route('cart.index')->with('success', 'Produkt wurde erfolgreich zum Warenkorb hinzugefügt!');
        } catch (\Exception $e) {
            \Log::error('Cart Add Error: ' . $e->getMessage());

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Fehler beim Hinzufügen zum Warenkorb. Bitte versuchen Sie es erneut.',
                    'error' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Fehler beim Hinzufügen zum Warenkorb. Bitte versuchen Sie es erneut.');
        }
    }

    public function update($id, Request $request)
    {
        try {
            $quantity = $request->input('quantity');
            $cart = session('cart', []);

            // Validate quantity
            if ($quantity < 1) {
                if ($request->wantsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Die Menge muss mindestens 1 betragen.',
                        'error' => 'Invalid quantity'
                    ], 400);
                }
                return redirect()->back()->with('error', 'Die Menge muss mindestens 1 betragen.');
            }

            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
                session(['cart' => $cart]);

                if ($request->wantsJson()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Warenkorb wurde aktualisiert!',
                        'cartCount' => count($cart),
                        'cartTotal' => $this->calculateTotal($cart),
                        'itemTotal' => $cart[$id]['price'] * $quantity,
                        'shippingCost' => session('shipping_cost', 11.50)
                    ]);
                }
            }

            return redirect()->route('cart.index')->with('success', 'Warenkorb wurde aktualisiert!');
        } catch (\Exception $e) {
            \Log::error('Cart Update Error: ' . $e->getMessage());

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Fehler beim Aktualisieren des Warenkorbs.',
                    'error' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Fehler beim Aktualisieren des Warenkorbs. Bitte versuchen Sie es erneut.');
        }
    }

    public function remove($id, Request $request)
    {
        try {
            $cart = session('cart', []);

            if (isset($cart[$id])) {
                unset($cart[$id]);
                session(['cart' => $cart]);

                if ($request->wantsJson()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Artikel wurde aus dem Warenkorb entfernt!',
                        'cartCount' => count($cart),
                        'cartTotal' => $this->calculateTotal($cart),
                        'shippingCost' => session('shipping_cost', 11.50),
                        'isCartEmpty' => empty($cart)
                    ]);
                }
            }

            return redirect()->route('cart.index')->with('success', 'Artikel wurde aus dem Warenkorb entfernt!');
        } catch (\Exception $e) {
            \Log::error('Cart Remove Error: ' . $e->getMessage());

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Fehler beim Entfernen des Artikels.',
                    'error' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Fehler beim Entfernen des Artikels. Bitte versuchen Sie es erneut.');
        }
    }

    public function clear(Request $request)
    {
        try {
            session()->forget('cart');

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Warenkorb wurde geleert!',
                    'cartCount' => 0,
                    'cartTotal' => 0
                ]);
            }

            return redirect()->route('cart.index')->with('success', 'Warenkorb wurde geleert!');
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Fehler beim Leeren des Warenkorbs.',
                    'error' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Fehler beim Leeren des Warenkorbs. Bitte versuchen Sie es erneut.');
        }
    }

    public function checkout()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Dein Warenkorb ist leer.');
        }

        return view('pages.landing.cart.checkout', [
            'cart' => $cart,
            'total' => $this->calculateTotal($cart)
        ]);
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
        ]);

        $cart = session('cart', []);
        $total = $this->calculateTotal($cart);

        // Create order
        $order = Order::create([
            'user_id' => auth()->id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'total' => $total,
            'status' => 'pending'
        ]);

        // Clear the cart
        session()->forget('cart');

        // Store order in session for success page
        session()->flash('order', $order);

        return redirect()->route('cart.checkout.success');
    }

    public function checkoutSuccess(Request $request)
    {
        $order_id = $request->get('order');

        if (!$order_id) {
            return redirect()->route('shop.index');
        }

        $order = Order::findOrFail($order_id);

        try {
            if (auth()->check()) {
                Mail::to(auth()->user()->email)->send(new OrderConfirmation($order, auth()->user()->gender));
                Mail::to(config('mail.admin_email'))->send(new OrderReceiptMail($order, auth()->user()));
            } else {
                Mail::to($order->shipping_email)->send(new OrderConfirmation($order, 'other'));
                Mail::to(config('mail.admin_email'))->send(new OrderReceiptMail($order, new User((['first_name' => 'Guest', 'last_name' => 'User', 'email' => $order->shipping_email]))));
            }
        } catch (Exception $e) {
            Log::error('' . $e->getMessage());
        }

        return view('pages.landing.cart.success', [
            'order' => $order
        ]);
    }

    private function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
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

        $cart = session('cart', []);
        $total = $this->calculateTotal($cart);

        return response()->json([
            'success' => true,
            'message' => 'Versandoption aktualisiert erfolgreich',
            'shipping_cost' => $request->shipping_cost,
            'total' => $total
        ]);
    }
}

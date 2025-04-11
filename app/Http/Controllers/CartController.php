<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.landing.cart.index');
    }

    public function add($productId, Request $request)
    {
        try {
            $product = $this->getProductData($productId);

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
                Cart::add([
                    'id' => $product['id'],
                    'name' => $product['name'],
                    'qty' => $quantity,
                    'price' => $product['price'],
                    'options' => [
                        'image' => $product['image'],
                        'description' => $product['description']
                    ]
                ]);
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

    public function checkoutSuccess()
    {
        if (!session()->has('order')) {
            return redirect()->route('cart.index');
        }

        return view('pages.landing.cart.success', [
            'order' => session('order')
        ]);
    }

    private function getProductData($id)
    {
        $products = [
            1 => [
                'id' => 1,
                'name' => 'Ritualkerze - Abschiedskerze',
                'price' => 28.90,
                'image' => asset(theme()->getMediaUrlPath() . 'landing/products/1.webp'),
                'description' => 'Vielleicht ist dein Herzenstier über die Regenbogenbrücke gegangen, oder aber auch ein geliebter Mensch hat diesen Planeten verlassen. Diese Kerze kannst du als Ritualkerze nehmen, um deinem verstorbenen zur Seite zu stehen.'
            ],
            2 => [
                'id' => 2,
                'name' => 'Ritual - Herzensöffner',
                'price' => 24.90,
                'image' => asset(theme()->getMediaUrlPath() . 'landing/products/2.webp'),
                'description' => 'Wir denken, dass unser Hirn uns leitet, aber in Wirklichkeit ist es unser Herz, welches uns den Weg weist.'
            ],
            3 => [
                'id' => 3,
                'name' => 'Ritual - Aurareinigung',
                'price' => 24.90,
                'image' => asset(theme()->getMediaUrlPath() . 'landing/products/3.webp'),
                'description' => 'Die Aura ist dein persönliches Energiefeld. Als Ritual kannst du sie täglich durch Räucherware reinigen.'
            ],
            4 => [
                'id' => 4,
                'name' => 'Ritualkerze - Vollmond',
                'price' => 24.90,
                'image' => asset(theme()->getMediaUrlPath() . 'landing/products/4.webp'),
                'description' => 'Der Vollmond hat einige Kräfte die du in diesem Leben für dich Nutzen kannst.'
            ],
            5 => [
                'id' => 5,
                'name' => 'Ritual - Neumond',
                'price' => 24.90,
                'image' => asset(theme()->getMediaUrlPath() . 'landing/products/5.webp'),
                'description' => 'Der Neumond ist eine Zeit der Neuanfänge und der inneren Einkehr.'
            ],
            6 => [
                'id' => 6,
                'name' => 'Energetisches Räumereinigen',
                'price' => 40.00,
                'image' => asset(theme()->getMediaUrlPath() . 'landing/products/6.webp'),
                'description' => 'Egal, ob an deinem Arbeitsplatz oder in deinem gemütlichen Zuhause. Alle Energien werden an Orten gesammelt.'
            ],
            7 => [
                'id' => 7,
                'name' => 'Palo Santo',
                'price' => 4.50,
                'image' => asset(theme()->getMediaUrlPath() . 'landing/products/7.webp'),
                'description' => 'Palo Santo ist - wie es schon der Name sagt - das "heilige Holz" Südamerikas.'
            ],
            8 => [
                'id' => 8,
                'name' => 'Räucherstäbchen - Engel der Fülle',
                'price' => 5.50,
                'image' => asset(theme()->getMediaUrlPath() . 'landing/products/8.webp'),
                'description' => 'Egal, um welche Art Fülle es sich handelt. Ob Finanzen, Gesundheit, Beziehungen oder eine andere Fülle.'
            ],
            9 => [
                'id' => 9,
                'name' => 'Räucherstäbchen - Engel der Liebe',
                'price' => 5.50,
                'image' => asset(theme()->getMediaUrlPath() . 'landing/products/9.webp'),
                'description' => 'Engel wünschen sich für uns nur das Beste. Egal ob du gerade deine Selbstliebe oder die grosse Liebe entdecken willst.'
            ],
            10 => [
                'id' => 10,
                'name' => 'Räucherstäbchen - Engel des Vertrauens',
                'price' => 5.50,
                'image' => asset(theme()->getMediaUrlPath() . 'landing/products/10.webp'),
                'description' => 'Vertrauen ist ein Grundkonstrukt für dein Leben. Egal, ob es sich um Selbst-Vertrauen handelt oder darum anderen zu vertrauen.'
            ],
            11 => [
                'id' => 11,
                'name' => 'Kartenset - Engel der Neuzeit',
                'price' => 30.90,
                'image' => asset(theme()->getMediaUrlPath() . 'landing/products/11.webp'),
                'description' => 'Als du dich entschieden hast noch einmal auf diesen Planten zu kommen und erneut deine Seele lernen zu lassen, warst du wirklich mutig.'
            ],
            12 => [
                'id' => 12,
                'name' => 'Dein Persönlicher Seelencode',
                'price' => 120.00,
                'image' => asset(theme()->getMediaUrlPath() . 'landing/products/12.webp'),
                'description' => 'Mit deinem Seelencode erfährst du nochmals genau, mit welchen Stärken und Schwächen du geboren wurdest.'
            ],
            13 => [
                'id' => 13,
                'name' => 'Herzens Gutschein',
                'price' => 80.00,
                'image' => asset(theme()->getMediaUrlPath() . 'landing/products/13.webp'),
                'description' => 'Du möchtest jemanden einen persönlichen Gutschein schenken, bei dem du jemandem auch noch etwas Gutes tust.'
            ],
            14 => [
                'id' => 14,
                'name' => 'Herzens Gutschein',
                'price' => 50.00,
                'image' => asset(theme()->getMediaUrlPath() . 'landing/products/14.webp'),
                'description' => 'Du möchtest jemanden einen persönlichen Gutschein schenken, bei dem du jemandem auch noch etwas Gutes tust.'
            ],
            15 => [
                'id' => 15,
                'name' => 'Herzens Gutschein',
                'price' => 120.00,
                'image' => asset(theme()->getMediaUrlPath() . 'landing/products/15.webp'),
                'description' => 'Du möchtest jemanden einen persönlichen Gutschein schenken, bei dem du jemandem auch noch etwas Gutes tust.'
            ]
        ];

        return $products[$id] ?? null;
    }
}

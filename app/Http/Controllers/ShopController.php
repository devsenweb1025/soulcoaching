<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display the shop page with all products.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Product::where('is_active', true)
            ->orderBy('created_at', 'desc');

        $products = $query->paginate(9);

        if ($request->ajax()) {
            return view('pages.landing.shop.partials.products', compact('products'))->render();
        }

        return view('pages.landing.shop', compact('products'));
    }

    /**
     * Display a single product.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('pages.landing.shop.show', compact('product'));
    }

    /**
     * Search products.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('q');

        $products = Product::query()
            ->where('is_active', true)
            ->when($query, function ($q) use ($query) {
                return $q->where(function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                      ->orWhere('description', 'like', "%{$query}%")
                      ->orWhere('sku', 'like', "%{$query}%");
                });
            })
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12)
            ->withQueryString();

        return view('pages.landing.shop', compact('products', 'query'));
    }

    /**
     * Filter products by category.
     *
     * @param  string  $category
     * @return \Illuminate\View\View
     */
    public function category($category)
    {
        $products = Product::query()
            ->where('is_active', true)
            ->whereHas('categories', function ($q) use ($category) {
                $q->where('slug', $category);
            })
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('pages.landing.shop', compact('products', 'category'));
    }
}

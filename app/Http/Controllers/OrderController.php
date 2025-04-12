<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with('items')
            ->latest()
            ->paginate(10);

        return view('pages.landing.account.orders', compact('orders'));
    }

    public function show(Order $order)
    {
        // Ensure the order belongs to the authenticated user
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access to this order.');
        }

        $order->load('items');

        return view('pages.landing.account.order-details', compact('order'));
    }

    public function track(Request $request)
    {
        $request->validate([
            'tracking_number' => 'required|string'
        ]);

        try {
            $order = Order::where('order_number', $request->tracking_number)->first();

            if (!$order) {
                return redirect()->back()->with('error', 'No order found with the provided details.');
            }

            return redirect()->route('account.orders.show', $order->id);
        } catch (\Exception $e) {
            Log::error('Order Tracking Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while tracking your order.');
        }
    }
}

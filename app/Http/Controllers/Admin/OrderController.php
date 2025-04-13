<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['user', 'items.product'])
            ->orderBy('created_at', 'desc');

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                    ->orWhereHas('user', function($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    });
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $orders = $query->paginate(10);

        return view('pages.admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'items.product']);
        return view('pages.admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order->update([
            'status' => $request->status,
            'notes' => $request->notes
        ]);

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

    public function updateTracking(Request $request, Order $order)
    {
        $request->validate([
            'tracking_number' => 'required|string',
            'tracking_url' => 'nullable|url'
        ]);

        $order->update([
            'tracking_number' => $request->tracking_number,
            'tracking_url' => $request->tracking_url
        ]);

        return redirect()->back()->with('success', 'Tracking information updated successfully.');
    }

    public function destroy(Order $order)
    {
        DB::transaction(function () use ($order) {
            $order->items()->delete();
            $order->delete();
        });

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order deleted successfully.');
    }

    public function export(Request $request)
    {
        $query = Order::with(['user', 'items.product'])
            ->orderBy('created_at', 'desc');

        if ($request->has('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->has('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $orders = $query->get();

        // TODO: Implement export logic (CSV, Excel, etc.)
        return response()->json(['message' => 'Export functionality to be implemented']);
    }
}

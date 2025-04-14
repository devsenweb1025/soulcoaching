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
            $query->where(function ($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {
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

        if ($request->ajax()) {
            return view('pages.admin.orders.partials.table', compact('orders'))->render();
        }

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
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled,refunded'
        ]);

        $order->update([
            'status' => $request->status,
            'notes' => $request->notes
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Order status updated successfully.',
            'status_badge' => $order->status_badge
        ]);
    }

    public function updatePaymentStatus(Request $request, Order $order)
    {
        $request->validate([
            'payment_status' => 'required|in:pending,paid,failed,refunded'
        ]);

        $order->update([
            'payment_status' => $request->payment_status,
            'notes' => $request->notes
        ]);


        return response()->json([
            'success' => true,
            'message' => 'Payment status updated successfully.',
            'payment_status_badge' => $order->payment_status_badge
        ]);
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

        return  response()->json([
            'success' => true,
            'message' => 'Tracking information updated successfully.',
            'tracking_number' => $order->tracking_number,
            'tracking_url' => $order->tracking_url
        ]);
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

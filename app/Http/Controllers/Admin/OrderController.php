<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderStatusUpdateMail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\OrderShipped;

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
                    ->orWhere('shipping_first_name', 'like', "%{$search}%")
                    ->orWhere('shipping_last_name', 'like', "%{$search}%")
                    ->orWhere('shipping_email', 'like', "%{$search}%")
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

        // Filter by customer type (guest/registered)
        if ($request->has('customer_type')) {
            switch ($request->customer_type) {
                case 'guest':
                    $query->whereNull('user_id');
                    break;
                case 'registered':
                    $query->whereNotNull('user_id');
                    break;
            }
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
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
            'tracking_number' => 'nullable|string|max:255',
        ]);

        $oldStatus = $order->status;
        $order->update([
            'status' => $request->status,
            'tracking_number' => $request->tracking_number,
        ]);

        // Send notification when order is shipped (only for registered users)
        if ($request->status === 'shipped' && $order->user_id) {
            $order->user->notify(new OrderShipped($order));
        }

        try {
            Mail::to($order->shipping_email)->send(new OrderStatusUpdateMail(
                $order,
                $order->user->gender,
                'status',
                $request->status,
                $oldStatus
            ));
        } catch (\Exception $e) {
            \Log::error('Failed to send order status update email: ' . $e->getMessage());
        }

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

        $oldPaymentStatus = $order->payment_status;
        $order->update([
            'payment_status' => $request->payment_status,
            'notes' => $request->notes
        ]);

        try {
            Mail::to($order->shipping_email)->send(new OrderStatusUpdateMail(
                $order,
                $order->user->gender,
                'payment',
                $request->payment_status,
                $oldPaymentStatus
            ));
        } catch (\Exception $e) {
            \Log::error('Failed to send payment status update email: ' . $e->getMessage());
        }

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

        $oldTracking = [
            'tracking_number' => $order->tracking_number,
            'tracking_url' => $order->tracking_url
        ];

        $order->update([
            'tracking_number' => $request->tracking_number,
            'tracking_url' => $request->tracking_url
        ]);

        try {
            Mail::to($order->shipping_email)->send(new OrderStatusUpdateMail(
                $order,
                $order->user->gender,
                'tracking',
                [
                    'tracking_number' => $request->tracking_number,
                    'tracking_url' => $request->tracking_url
                ],
                $oldTracking
            ));
        } catch (\Exception $e) {
            \Log::error('Failed to send tracking update email: ' . $e->getMessage());
        }

        return response()->json([
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

        // Filter by customer type
        if ($request->has('customer_type')) {
            switch ($request->customer_type) {
                case 'guest':
                    $query->whereNull('user_id');
                    break;
                case 'registered':
                    $query->whereNotNull('user_id');
                    break;
            }
        }

        $orders = $query->get();

        // TODO: Implement export logic (CSV, Excel, etc.)
        return response()->json(['message' => 'Export functionality to be implemented']);
    }
}

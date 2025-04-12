<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Course;
use App\Models\Booking;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        // Get counts
        $productCount = Product::count();
        $courseCount = Course::count();
        $orderCount = Order::count();
        $bookingCount = Booking::count();

        // Calculate total benefits
        $totalBenefits = Order::where('status', 'completed')->sum('total_amount');

        // Get recent orders
        $recentOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        // Get recent chat messages
        $recentChats = ChatMessage::with('user')
            ->latest()
            ->take(5)
            ->get();

        // Get recent bookings
        $recentBookings = Booking::with('user')
            ->latest()
            ->take(5)
            ->get();

        // Get sales data for chart
        $salesData = Order::where('status', 'completed')
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->selectRaw('DATE(created_at) as date, SUM(total) as total')
            ->groupBy('date')
            ->get()
            ->pluck('total', 'date');

        return view('pages.admin.dashboard', compact(
            'productCount',
            'courseCount',
            'orderCount',
            'bookingCount',
            'totalBenefits',
            'recentOrders',
            'recentChats',
            'recentBookings',
            'salesData'
        ));
    }
}

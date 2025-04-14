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
use Illuminate\Support\Collection;

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
        $totalBenefits = Order::where('status', 'delivered')->sum('total');

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
        $salesData = new Collection();

        // Get last 30 days
        $dates = collect();
        for ($i = 29; $i >= 0; $i--) {
            $dates->push(Carbon::now()->subDays($i)->format('Y-m-d'));
        }

        // Get course sales
        $courseSales = Booking::where('status', 'completed')
            ->where('payment_status', 'paid')
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->selectRaw('DATE(created_at) as date, SUM(amount) as total')
            ->groupBy('date')
            ->get()
            ->pluck('total', 'date');

        // Get product sales
        $productSales = Order::where('status', 'delivered')
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->selectRaw('DATE(created_at) as date, SUM(total) as total')
            ->groupBy('date')
            ->get()
            ->pluck('total', 'date');

        // Combine all sales data
        foreach ($dates as $date) {
            $salesData->push([
                'date' => $date,
                'course' => $courseSales[$date] ?? 0,
                'product' => $productSales[$date] ?? 0,
                'other' => 0,
                'total' => ($courseSales[$date] ?? 0) + ($productSales[$date] ?? 0)
            ]);
        }

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

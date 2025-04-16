<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('notifiable_type', 'App\Models\User')
            ->where('notifiable_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('pages.admin.notifications.index', compact('notifications'));
    }

    public function markAsRead(Notification $notification)
    {
        $notification->markAsRead();
        return response()->json(['success' => true]);
    }

    public function markAllAsRead()
    {
        Notification::where('notifiable_type', 'App\Models\User')
            ->where('notifiable_id', auth()->id())
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return response()->json(['success' => true]);
    }

    public function getUnreadCount()
    {
        $count = Notification::where('notifiable_type', 'App\Models\User')
            ->where('notifiable_id', auth()->id())
            ->whereNull('read_at')
            ->count();

        return response()->json(['count' => $count]);
    }

    public function getRecentNotifications()
    {
        $notifications = Notification::where('notifiable_type', 'App\Models\User')
            ->where('notifiable_id', auth()->id())
            ->latest()
            ->take(5)
            ->get();

        return response()->json($notifications);
    }
}

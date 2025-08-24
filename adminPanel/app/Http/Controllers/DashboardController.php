<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications; // All notifications
        $unread = auth()->user()->unreadNotifications;  // Only unread

        return view('dashboard', compact('notifications', 'unread'));
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back()->with('success', 'All notifications marked as read.');
    }
}

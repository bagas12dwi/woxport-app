<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->orderBy('read', 'asc')
            ->get();

        $notificationUnread = Notification::where('user_id', auth()->user()->id)
            ->where('read', false)
            ->get();

        return view('users.notifications', [
            'title' => 'Notifikasi',
            'notifications' => $notifications,
        ]);
    }

    public function markAsRead(Notification $notification)
    {
        $notification->update(['read' => true]);

        return response()->json(['success' => true, 'url_destination' => $notification->url]);
    }

    public function dropdown()
    {
        $notifications = Notification::latest()->take(5)->get();

        return view('components.notification', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        //
    }
}

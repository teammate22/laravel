<?php

namespace App\Http\Controllers;

class NotificationController extends Controller
{
    public function read($id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();

        return redirect()->route('news.show', ['article' => $notification->data['article_id']]);
    }

    public function index()
    {
        $notifications = auth()->user()->notifications()->latest()->get();

        return view('notifications.index', compact('notifications'));
    }
}

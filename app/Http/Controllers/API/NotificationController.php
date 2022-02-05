<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
         $notification = Notification::where('active', true)->latest()->first();
         return response()->success($notification);
    }
}

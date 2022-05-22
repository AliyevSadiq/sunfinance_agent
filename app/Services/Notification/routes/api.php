<?php

// Prefix: /api/notification
use App\Services\Notification\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

Route::apiResource('notification','NotificationController')->except(['update','destroy']);

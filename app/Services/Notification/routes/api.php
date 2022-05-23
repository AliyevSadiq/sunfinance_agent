<?php

// Prefix: /api/notification
use App\Services\Notification\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('notification', 'NotificationController')->except(['update', 'destroy']);
});

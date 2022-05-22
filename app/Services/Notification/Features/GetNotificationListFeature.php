<?php

declare(strict_types=1);

namespace App\Services\Notification\Features;

use App\Domains\Notification\Jobs\GetNotificationListJob;
use App\Http\Resources\NotificationResource;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class GetNotificationListFeature extends Feature
{
    public function handle(Request $request)
    {
       $notifications=$this->run(GetNotificationListJob::class,[
           'clientId'=>$request->get('clientId')
       ]);
       return NotificationResource::collection($notifications);
    }
}

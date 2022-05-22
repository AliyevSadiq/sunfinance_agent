<?php

namespace App\Services\Notification\Features;

use App\Data\Models\Notification;
use App\Http\Resources\NotificationResource;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetNotificationFeature extends Feature
{
    private Notification $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }


    public function handle(Request $request)
    {
        return $this->run(new RespondWithJsonJob([
            'notification' => new NotificationResource($this->notification),
        ]));
    }
}

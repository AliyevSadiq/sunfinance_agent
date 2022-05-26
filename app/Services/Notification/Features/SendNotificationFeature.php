<?php

declare(strict_types=1);

namespace App\Services\Notification\Features;

use App\Domains\Notification\Requests\CreateNotificationRequest;
use App\Services\Notification\Operations\SendNotificationOperation;
use Lucid\Units\Feature;

class SendNotificationFeature extends Feature
{
    public function handle(CreateNotificationRequest $request)
    {
        return $this->run(SendNotificationOperation::class, [
            'notifications' => $request->notification
        ]);
    }
}

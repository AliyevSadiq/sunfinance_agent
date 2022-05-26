<?php

declare(strict_types=1);

namespace App\Services\Notification\Operations;

use App\Domains\Notification\Jobs\{CreateNotificationJob, GetLastNotificationJob, SendNotificationJob};
use App\Http\Resources\NotificationResource;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Operation;

class SendNotificationOperation extends Operation
{
    private array $notifications;

    /**
     * Create a new operation instance.
     *
     * @return void
     */
    public function __construct(array $notifications)
    {
        //
        $this->notifications = $notifications;
    }

    /**
     * Execute the operation.
     *
     * @return void
     */
    public function handle()
    {
        $this->run(CreateNotificationJob::class, [
            'notifications' => $this->notifications
        ]);

        $lastNotifications = $this->run(GetLastNotificationJob::class, [
            'count' => count($this->notifications)
        ]);

        $this->run(SendNotificationJob::class, [
            'notifications' => $lastNotifications
        ]);

        return $this->run(new RespondWithJsonJob([
            'notifications' => NotificationResource::collection($lastNotifications),
        ]));

    }
}

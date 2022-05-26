<?php

declare(strict_types=1);

namespace App\Services\Notification\Service\NotificationManager;

use App\Data\Models\Notification;
use App\Jobs\SendNotificationJob;
use App\Services\Notification\Contract\InterfaceSendNotification;
use App\Services\Notification\Enums\NotificationStatus;
use Exception;

class EmailManager implements InterfaceSendNotification
{
    private Notification $notification;

    public function setNotification(Notification $notification): self
    {
        $this->notification = $notification;
        return $this;
    }

    public function send()
    {
        try {
            SendNotificationJob::dispatch($this->notification, NotificationStatus::SENT, 'EMAIL CHANNEL');
        } catch (Exception $exception) {
            info($exception->getMessage());
        }
    }
}

<?php

declare(strict_types=1);

namespace App\Services\Notification\Service\NotificationManager;

use App\Data\Models\Notification;
use App\Jobs\PingJob;
use App\Services\Notification\Contract\InterfaceSendNotification;
use App\Services\Notification\Enums\NotificationStatus;

class SmsManager implements InterfaceSendNotification
{
    private Notification $notification;


    public function setNotification(Notification $notification): self
    {
        $this->notification=$notification;
        return $this;
    }


    public function send()
    {
        PingJob::dispatch($this->notification,NotificationStatus::SENT,'SMS CHANNEL');
    }

}

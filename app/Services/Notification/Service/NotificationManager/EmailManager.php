<?php

declare(strict_types=1);

namespace App\Services\Notification\Service\NotificationManager;

use App\Data\Models\Notification;
use App\Services\Notification\Contract\InterfaceSendNotification;

class EmailManager implements InterfaceSendNotification
{
    private Notification $notification;

    public function setNotification(Notification $notification): self
    {
        $this->notification=$notification;
        return $this;
    }


    public function send()
    {
        info('user email='.$this->notification->client->email);
        info('email content='.$this->notification->content);
    }

}

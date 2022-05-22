<?php

declare(strict_types=1);

namespace App\Services\Notification\Service\NotificationManager;

use App\Services\Notification\Contract\InterfaceChannelManager;
use App\Services\Notification\Enums\NotificationChannels;

class Manager implements InterfaceChannelManager
{
    private string $channel;

    public function setChannel(string $channel): self
    {
        $this->channel = $channel;
        return $this;
    }

    public function run()
    {
        switch ($this->channel) {
            case NotificationChannels::EMAIL:
                $manager=new EmailManager();
                break;
            case NotificationChannels::SMS:
                $manager=new SmsManager();
                break;
            default:
                return throw new \Exception("Manager not found");
        }
        return $manager;
    }
}

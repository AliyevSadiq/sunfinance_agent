<?php

declare(strict_types=1);

namespace App\Services\Notification\Contract;

use App\Data\Models\Notification;

interface InterfaceSendNotification
{
    public function setNotification(Notification $notification);

    public function send();
}

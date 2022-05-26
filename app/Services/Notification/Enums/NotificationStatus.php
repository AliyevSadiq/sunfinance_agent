<?php

namespace App\Services\Notification\Enums;

use BenSampo\Enum\Enum;

final class NotificationStatus extends Enum
{
    public const CREATED = 1;
    public const SENT = 2;
    public const FAILED = 3;
}

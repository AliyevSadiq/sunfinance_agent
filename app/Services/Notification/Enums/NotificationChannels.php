<?php

namespace App\Services\Notification\Enums;

use BenSampo\Enum\Enum;

final class NotificationChannels extends Enum
{
    public const SMS = 'sms';
    public const EMAIL = 'email';
}

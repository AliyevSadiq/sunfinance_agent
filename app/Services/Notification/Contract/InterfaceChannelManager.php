<?php

declare(strict_types=1);

namespace App\Services\Notification\Contract;

use App\Data\Models\Client;

interface InterfaceChannelManager
{


    public function setChannel(string $channel);

    public function run();
}

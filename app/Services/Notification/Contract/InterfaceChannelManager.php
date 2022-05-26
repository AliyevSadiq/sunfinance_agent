<?php

declare(strict_types=1);

namespace App\Services\Notification\Contract;

interface InterfaceChannelManager
{


    public function setChannel(string $channel);

    public function run();
}

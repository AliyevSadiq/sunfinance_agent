<?php

declare(strict_types=1);

namespace App\Domains\Notification\Jobs;

use App\Data\Models\Notification;
use Lucid\Units\Job;

class GetNotificationListJob extends Job
{
    private ?int $clientId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(?int $clientId=null)
    {
        $this->clientId = $clientId;
    }


    public function handle()
    {
        return Notification::with('client')
            ->when(isset($this->clientId),function ($query){
                $query->where('clientId',$this->clientId);
            })->paginate(10);
    }
}

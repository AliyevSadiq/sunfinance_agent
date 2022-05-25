<?php

declare(strict_types=1);

namespace App\Domains\Notification\Jobs;

use App\Services\Notification\Service\NotificationManager\Manager;
use Illuminate\Database\Eloquent\Collection;
use Lucid\Units\Job;

class SendNotificationJob extends Job
{
    private Collection $notifications;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Collection $notifications)
    {
        $this->notifications = $notifications;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $manager = new Manager();

        foreach ($this->notifications as $notification) {
            $channel = $manager->setChannel($notification->channel)->run();
            $channel->setNotification($notification)
                ->send();
        }
    }
}

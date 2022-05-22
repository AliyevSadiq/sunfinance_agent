<?php

namespace App\Domains\Notification\Jobs;

use App\Data\Models\Notification;
use Lucid\Units\Job;

class CreateNotificationJob extends Job
{
    private array $notifications;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $notifications)
    {
        //
        $this->notifications = $notifications;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Notification::insert($this->notifications);
    }
}

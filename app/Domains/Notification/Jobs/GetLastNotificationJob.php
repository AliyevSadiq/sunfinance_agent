<?php

declare(strict_types=1);

namespace App\Domains\Notification\Jobs;

use App\Data\Models\Notification;
use Lucid\Units\Job;

class GetLastNotificationJob extends Job
{
    private int $count;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $count)
    {
        $this->count = $count;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function handle()
    {
        return Notification::with('client')->orderByDesc('id')->limit($this->count)->get();
    }
}

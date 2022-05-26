<?php

declare(strict_types=1);

namespace App\Domains\Notification\Jobs;

use App\Data\Models\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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
     * @return Builder[]|Collection
     */
    public function handle()
    {
        return Notification::with('client')->orderByDesc('id')->limit($this->count)->get();
    }
}

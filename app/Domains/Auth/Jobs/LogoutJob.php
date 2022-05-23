<?php

declare(strict_types=1);

namespace App\Domains\Auth\Jobs;

use Lucid\Units\Job;

class LogoutJob extends Job
{
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        auth()->user()->currentAccessToken()->delete();
    }
}

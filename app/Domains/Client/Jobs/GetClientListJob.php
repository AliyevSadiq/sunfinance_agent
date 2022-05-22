<?php

namespace App\Domains\Client\Jobs;

use App\Data\Models\Client;
use Lucid\Units\Job;

class GetClientListJob extends Job
{
    /**
     * @return Client[]|\Illuminate\Database\Eloquent\Collection
     */
    public function handle()
    {
        return Client::paginate(10);
    }
}

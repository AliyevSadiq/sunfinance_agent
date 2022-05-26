<?php

namespace App\Domains\Client\Jobs;

use App\Data\Models\Client;
use Illuminate\Database\Eloquent\Collection;
use Lucid\Units\Job;

class GetClientListJob extends Job
{
    /**
     * @return Client[]|Collection
     */
    public function handle()
    {
        return Client::paginate(10);
    }
}

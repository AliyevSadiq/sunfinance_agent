<?php

namespace App\Services\Client\Features;

use App\Domains\Client\Jobs\GetClientListJob;
use App\Http\Resources\ClientResource;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetClientListFeature extends Feature
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function handle(Request $request)
    {
        $clients = $this->run(GetClientListJob::class);
        return ClientResource::collection($clients);
    }
}

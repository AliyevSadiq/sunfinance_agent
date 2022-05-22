<?php



namespace App\Services\Client\Features;

use App\Data\Models\Client;
use App\Http\Resources\ClientResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetClientFeature extends Feature
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function handle(Request $request)
    {
        return $this->run(new RespondWithJsonJob([
            'client' => new ClientResource($this->client),
        ]));
    }
}

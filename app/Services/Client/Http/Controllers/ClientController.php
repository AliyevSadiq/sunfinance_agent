<?php

declare(strict_types=1);

namespace App\Services\Client\Http\Controllers;

use App\Data\Models\Client;
use App\Services\Client\Features\{
    GetClientFeature,
    GetClientListFeature
};
use App\Traits\WithTransaction;
use Lucid\Units\Controller;

class ClientController extends Controller
{
    use WithTransaction;

    /**
     * @OA\Get(
     *      path="/api/clients",
     *       tags={"Clients"},
     *      summary="Get list of clients",
     *      description="Returns list of clients",
     *      security={{"bearerAuth":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     *     )
     */
    public function index()
    {
        return $this->serveFeature(GetClientListFeature::class);
    }

    /**
     * @OA\Get(
     *      path="/api/clients/{client}",
     *     tags={"Clients"},
     *      summary="Get client information",
     *      description="Return client data",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="client",
     *          description="Client id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found",
     *      )
     * )
     */
    public function show(Client $client)
    {
        return $this->serveFeature(GetClientFeature::class, [
            'client' => $client
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Services\Notification\Http\Controllers;

use App\Data\Models\Notification;
use App\Services\Notification\Features\{GetNotificationFeature, GetNotificationListFeature, SendNotificationFeature};
use App\Traits\WithTransaction;
use Lucid\Units\Controller;

class NotificationController extends Controller
{
    use WithTransaction;

    /**
     * @OA\Get(
     *      path="/api/notification",
     *     tags={"Notification"},
     *      summary="Get notification list",
     *      description="Return notifications data",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="clientId",
     *          description="Client id",
     *          required=false,
     *          in="query",
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
     *      )
     * )
     */
    public function index()
    {
        return $this->serveFeature(GetNotificationListFeature::class);
    }

    /**
     * @OA\Post(
     *      path="/api/notification",
     *      tags={"Notification"},
     *      summary="Create notification",
     *      description="Returns user data",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SendNotificationRequest"),
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(type="object")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *     @OA\Response(
     *          response=422,
     *          description="Validation error",
     *          @OA\JsonContent(type="object")
     *      )
     * )
     */
    public function store()
    {
        return $this->serveFeature(SendNotificationFeature::class);
    }

    /**
     * @OA\Get(
     *      path="/api/notification/{notification}",
     *     tags={"Notification"},
     *      summary="Get notification information",
     *      description="Return notification data",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="notification",
     *          description="Notification id",
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
    public function show(Notification $notification)
    {
        return $this->serveFeature(GetNotificationFeature::class, [
            'notification' => $notification
        ]);
    }
}

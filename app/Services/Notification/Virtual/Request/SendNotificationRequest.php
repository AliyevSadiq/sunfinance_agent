<?php

namespace App\Services\Notification\Virtual\Request;

/**
 * @OA\Schema(
 *      title="Send notification request",
 *      description="Send notification request body data",
 *      type="object",
 *      required={"notification"}
 * )
 */
class SendNotificationRequest
{
    /**
     * @OA\Property(
     *     title="notification",
     *     description="Notification list",
     *     type="array",
     *     @OA\Items(
     *          @OA\Property(
     *              property="clientId",
     *              description="Id of client",
     *              type="integer",
     *              example=1
     *          ),
     *          @OA\Property(
     *              property="channel",
     *              description="Channel type (Sms or Email)",
     *              type="string",
     *              example="email"
     *          ),
     *          @OA\Property(
     *              property="content",
     *              description="Content of notification",
     *              type="string",
     *              example="Content of notification"
     *          )
     *     )
     * )
     */
    public array $notification;
}

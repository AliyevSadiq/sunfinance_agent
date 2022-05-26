<?php

namespace App\Http\Resources;

use App\Data\Models\Notification;
use App\Services\Notification\Enums\NotificationStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return [
           'id'=>$this->id,
           'channel'=>$this->channel,
           'client'=>new ClientResource($this->client),
           'content'=>$this->content
       ];
    }
}

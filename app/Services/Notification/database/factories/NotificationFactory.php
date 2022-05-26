<?php

namespace App\Services\Notification\database\factories;

use App\Data\Models\Client;
use App\Data\Models\Notification;
use App\Services\Notification\Enums\NotificationChannels;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'clientId' => Client::factory()->create()->first()->id,
            'channel' => $this->faker->randomElement(NotificationChannels::getValues()),
            'content' => $this->faker->text(100)
        ];
    }
}

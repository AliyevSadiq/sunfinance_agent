<?php

namespace App\Services\Client\database\factories;

use App\Data\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName' => $this->faker->regexify('[A-Za-z ]{2,32}'),
            'lastName' => $this->faker->regexify('[A-Za-z ]{2,32}'),
            'email' => $this->faker->email,
            'phoneNumber' => $this->faker->e164PhoneNumber
        ];
    }
}

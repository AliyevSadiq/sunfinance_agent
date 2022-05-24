<?php

namespace App\Services\Auth\database\factories;

use App\Data\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{


    protected $model=User::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'email'=>$this->faker->email,
            'password'=>$this->faker->password,
        ];
    }
}

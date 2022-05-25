<?php

namespace Tests\Feature\Services\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class RegistrationFeatureTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * @test
     */
    public function feature_should_pass_when_user_registered()
    {
        $password = $this->faker->password;
        $email = $this->faker->email;
        $name = $this->faker->name;

        $res = $this->postJson(route('auth.register'), [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);
        $res->assertStatus(Response::HTTP_OK);
        $this->assertEquals($name, $res->json('data')['user']['name']);
    }
}

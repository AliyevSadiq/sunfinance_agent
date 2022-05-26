<?php

namespace Tests\Traits;

use App\Data\Models\User;
use Illuminate\Testing\TestResponse;

trait TestHelper
{
    private static ?string $token = null;

    private array $headers = [];

    private User $user;

    public function addTokenToHeaders()
    {
        $this->setDefaultUser();

        $this->headers['Authorization'] = "Bearer {$this->getToken()}";
    }

    public function setDefaultUser()
    {
        $this->createUser();

        if (!self::$token) {
            self::$token = json_decode($this->login($this->user->getEmail())->getContent(),
                true)['data']['access_token'];
        }
    }

    private function createUser()
    {
        $this->user = User::factory()->create()->first();
    }

    public function login(string $email, string $password = '12345678'): TestResponse
    {
        return $this->postJson(route('auth.login'),
            [
                'email' => $email,
                'password' => $password
            ]
        );
    }

    public function getToken(): ?string
    {
        return self::$token;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }
}

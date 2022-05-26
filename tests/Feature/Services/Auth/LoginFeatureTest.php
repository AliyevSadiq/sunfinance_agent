<?php

namespace Tests\Feature\Services\Auth;

use App\Data\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class LoginFeatureTest extends TestCase
{
    use  RefreshDatabase;

    private User $user;

    /**
     * @test
     */
    public function feature_should_pass_when_is_login()
    {
        $res = $this->postJson(route('auth.login'), [
            'email' => $this->user->getEmail(),
            'password' => '12345678',
        ]);
        $res->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function feature_should_failed_when_is_invalid_credentionals()
    {
        $res = $this->postJson(route('auth.login'), [
            'email' => $this->user->getEmail(),
            'password' => '1234567',
        ]);
        $res->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create()->first();
    }
}

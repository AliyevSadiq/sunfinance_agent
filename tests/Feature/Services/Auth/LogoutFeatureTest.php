<?php

namespace Tests\Feature\Services\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;
use Tests\Traits\TestHelper;

class LogoutFeatureTest extends TestCase
{

    use RefreshDatabase, TestHelper;

    /**
     * @test
     */
    public function feature_should_pass_when_user_can_access_logout()
    {
        $response = $this->json('POST', route('auth.logout'), [], $this->getHeaders());
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function feature_should_failed_when_user_cannot_access_logout()
    {
        $response = $this->json('POST', route('auth.logout'), []);
        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->addTokenToHeaders();
    }
}

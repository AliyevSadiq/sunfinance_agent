<?php

namespace Tests\Unit\Domains\Auth\Jobs;

use App\Data\Models\User;
use App\Domains\Auth\Jobs\GetTokenJob;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetTokenJobTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * @var User
     */
    private User $user;

    /**
     * @test
     */
    public function job_should_pass_when_return_user_token()
    {
        $job = new GetTokenJob($this->user);
        $token = $job->handle();
        $this->assertNotEmpty($token);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create()->first();
    }
}

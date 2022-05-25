<?php

namespace Tests\Unit\Domains\Auth\Jobs;

use App\Data\Models\User;
use App\Domains\Auth\Jobs\GetUserJob;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetUserJobTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * @var User
     */
    private User $user;

    /**
     * @test
     */
    public function job_should_pass_when_user_found()
    {
        $job = new GetUserJob($this->user->getEmail());
        $user = $job->handle();
        $this->assertModelExists($user);
    }

    /**
     * @test
     */
    public function job_should_failed_when_user_not_found()
    {
        $job = new GetUserJob($this->faker->email);
        $user = $job->handle();
        $this->assertEmpty($user);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create()->first();
    }
}

<?php

namespace Tests\Unit\Domains\Auth\Jobs;

use App\Data\Models\User;
use App\Domains\Auth\Jobs\RegistrationJob;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationJobTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $email;

    private User $user;

    /**
     * @test
     */
    public function job_should_pass_when_user_is_created()
    {
        $this->assertModelExists($this->user);
    }

    /**
     * @test
     */
    public function job_should_pass_when_user_name_is_exists()
    {
        $this->assertEquals($this->user->getName(), $this->name);
    }

    /**
     * @test
     */
    public function job_should_pass_when_user_email_is_exists()
    {
        $this->assertEquals($this->user->getEmail(), $this->email);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->name = $this->faker->name;
        $this->email = $this->faker->email;
        $password = $this->faker->password;
        $job = new RegistrationJob($this->name, $this->email, $password);
        $this->user = $job->handle();
    }

}

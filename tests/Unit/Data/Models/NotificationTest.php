<?php

namespace Tests\Unit\Data\Models;

use App\Data\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotificationTest extends TestCase
{

    use WithFaker;

    /**
     * @var User
     */
    private User $user;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $email;

    /** @test */
    public function can_get_name(): void
    {
        $this->user->setName($this->name);

        $this->assertEquals($this->user->getName(), $this->name);
    }

    /** @test */
    public function can_get_email(): void
    {
        $this->user->setEmail($this->email);

        $this->assertEquals($this->user->getEmail(), $this->email);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = new User();
        $this->name = $this->faker->name;
        $this->email = $this->faker->email;
    }
}

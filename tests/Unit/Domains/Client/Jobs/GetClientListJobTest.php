<?php

namespace Tests\Unit\Domains\Client\Jobs;

use App\Data\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetClientListJobTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    private $clients;

    /**
     * @test
     */
    public function job_should_pass_when_is_not_empty()
    {
        $this->assertNotEmpty($this->clients);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->clients = Client::factory(10)->create();
    }
}

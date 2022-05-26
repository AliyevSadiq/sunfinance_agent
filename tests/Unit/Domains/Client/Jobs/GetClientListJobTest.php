<?php

namespace Tests\Unit\Domains\Client\Jobs;

use App\Data\Models\Client;
use App\Domains\Client\Jobs\GetClientListJob;
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
        $this->assertNotEmpty((new GetClientListJob())->handle());
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->clients = Client::factory(10)->create();
    }
}

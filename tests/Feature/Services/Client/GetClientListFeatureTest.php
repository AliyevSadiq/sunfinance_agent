<?php

namespace Tests\Feature\Services\Client;

use App\Data\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;
use Tests\Traits\TestHelper;

class GetClientListFeatureTest extends TestCase
{
    use RefreshDatabase, TestHelper;

    /**
     * @var Client
     */
    private Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->addTokenToHeaders();

        $this->client=Client::factory()->create()->first();
    }

    /**
     * @test
     */
    public function feature_should_pass_when_has_access()
    {
        $res=$this->get(route('clients.index'),$this->getHeaders());
        $res->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function feature_should_failed_when_doesnt_have_access()
    {
        $res=$this->get(route('clients.index'));
        $res->assertStatus(Response::HTTP_FOUND);
    }
}

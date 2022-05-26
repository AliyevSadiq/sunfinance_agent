<?php

namespace Tests\Feature\Services\Notification;

use App\Data\Models\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;
use Tests\Traits\TestHelper;

class GetNotificationFeatureTest extends TestCase
{
    use RefreshDatabase, TestHelper;

    /**
     * @var Notification
     */
    private Notification $notification;

    /**
     * @test
     */
    public function feature_should_pass_when_has_access()
    {
        $res = $this->get(route('notification.show', ['notification' => $this->notification->id]), $this->getHeaders());
        $res->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function feature_should_failed_when_doesnt_have_access()
    {
        $res = $this->get(route('notification.show', ['notification' => $this->notification->id]));
        $res->assertStatus(Response::HTTP_FOUND);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->addTokenToHeaders();

        $this->notification = Notification::factory()->create()->first();
    }
}

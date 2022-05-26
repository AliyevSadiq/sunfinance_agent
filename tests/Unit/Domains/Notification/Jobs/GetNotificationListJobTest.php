<?php

namespace Tests\Unit\Domains\Notification\Jobs;

use App\Data\Models\Notification;
use App\Domains\Notification\Jobs\GetNotificationListJob;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetNotificationListJobTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @var Collection|\Illuminate\Database\Eloquent\Model
     */
    private Collection $notifications;

    /**
     * @var int
     */
    private int $client_id;

    protected function setUp(): void
    {
        parent::setUp();
        $this->notifications = Notification::factory(10)->create()->sortByDesc('id');
        $this->client_id = $this->notifications->first()->clientId;
    }

    /**
     * @test
     */
    public function job_should_pass_when_notification_list_is_not_empty()
    {
        $this->assertNotEmpty((new GetNotificationListJob())->handle());
    }

    /**
     * @test
     */
    public function job_should_pass_when_notification_list_is_not_empty_by_client_id()
    {
        $this->assertNotEmpty((new GetNotificationListJob($this->client_id))->handle());
    }

    /**
     * @test
     */
    public function job_should_failed_when_notification_list_is_empty_by_client_id()
    {
        $this->assertEmpty((new GetNotificationListJob($this->faker->numberBetween(11, 20)))->handle());
    }
}

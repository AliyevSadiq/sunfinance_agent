<?php

namespace Tests\Unit\Domains\Notification\Jobs;

use App\Data\Models\Notification;
use App\Domains\Notification\Jobs\GetLastNotificationJob;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetLastNotificationJobTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @var Collection|Model
     */
    private Collection $notifications;

    /**
     * @var int
     */
    private int $client_id;

    /**
     * @test
     */
    public function job_should_pass_when_notifications_list_is_not_empty()
    {
        $this->assertNotEmpty((new GetLastNotificationJob($this->notifications->count()))->handle());
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->notifications = Notification::factory(10)->create()->sortByDesc('id');
    }
}

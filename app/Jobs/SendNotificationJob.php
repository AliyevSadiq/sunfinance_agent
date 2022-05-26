<?php

namespace App\Jobs;

use App\Data\Models\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Notification $notification;
    private int $status;
    private string $channel_type;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Notification $notification, int $status, string $channel_type)
    {
        $this->notification = $notification;
        $this->status = $status;
        $this->channel_type = $channel_type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}

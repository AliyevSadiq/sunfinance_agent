<?php

use App\Services\Notification\Enums\{NotificationChannels,NotificationStatus};
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clientId')->references('id')->on('clients')->restrictOnDelete();
            $table->enum('channel',NotificationChannels::getValues());
            $table->text('content');
            $table->enum('status',NotificationStatus::getValues())->default(NotificationStatus::CREATED);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}

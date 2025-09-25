<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosRecordingsPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos_recordings_pictures', function (Blueprint $table) {
            $table->id();
            $table->string('pin');
            $table->timestamp('date');
            $table->text('address');
            $table->text('description');
            $table->text('media')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos_recordings_pictures');
    }
}

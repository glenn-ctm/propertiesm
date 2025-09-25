<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToVideosRecordingsPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos_recordings_pictures', function (Blueprint $table) {
            $table->dropColumn('pin');
            $table->dropColumn('media');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos_recordings_pictures', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->string('pin');
            $table->text('media')->nullable();
        });
    }
}

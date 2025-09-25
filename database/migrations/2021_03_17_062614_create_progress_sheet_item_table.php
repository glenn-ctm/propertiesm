<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressSheetItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_sheet_items', function (Blueprint $table) {
            $table->id();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('unit');
            $table->json('rents');
            $table->string('repairs');
            $table->foreignId('progress_sheet_id')->references('id')->on('progress_sheets')->onDelete('cascade');
            $table->boolean('tl')->nullable();
            $table->boolean('subc')->nullable();
            $table->string('cost');
            $table->json('inspection');
            $table->date('new_occupant')->nullable();
            $table->date('eviction')->nullable();
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
        Schema::dropIfExists('progress_sheet_items');
    }
}

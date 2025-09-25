<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressSheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_sheets', function (Blueprint $table) {
            $table->id();
            $table->string('property_address');
            $table->string('status')->default('ONGOING');
            $table->timestamp('date');
            $table->string('comment')->nullable();
            $table->json('ls_per_week')->nullable();
            $table->json('sc_per_week')->nullable();
            $table->float('ls_amount_per_week', 8, 2);
            $table->float('sc_amount_per_week', 8, 2);
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
        Schema::dropIfExists('progress_sheets');
    }
}

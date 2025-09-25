<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProgressSheetItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('progress_sheet_items', function ($table) {
            $table->string('unit')->nullable()->change();
            $table->json('rents')->nullable()->change();
            $table->string('repairs')->nullable()->change();
            $table->string('cost')->nullable()->change();
            $table->json('inspection')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('progress_sheet_items', function ($table) {
            $table->string('unit')->change();
            $table->json('rents')->change();
            $table->string('repairs')->change();
            $table->string('cost')->change();
            $table->json('inspection')->change();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContactAddressToRepairRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('repair_requests', function (Blueprint $table) {
            $table->text('address');
            $table->string('contact_number');
            $table->boolean('opt_out')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('repair_requests', function (Blueprint $table) {
            $table->dropColumn(['address', 'contact_number', 'opt_out']);
        });
    }
}

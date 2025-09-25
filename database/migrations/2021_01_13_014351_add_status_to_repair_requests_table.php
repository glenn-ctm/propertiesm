<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\RepairRequestStatus;

class AddStatusToRepairRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('repair_requests', function (Blueprint $table) {
            $table->string('status', 50)->default(RepairRequestStatus::PENDING);
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
            $table->dropColumn('status');
        });
    }
}

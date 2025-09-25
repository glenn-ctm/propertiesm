<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_user', function (Blueprint $table) {
            $table->bigInteger('property_id');
            $table->bigInteger('user_id');
        });
        
        Schema::table('properties', function (Blueprint $table) {
            $table->dropForeign('properties_user_id_foreign');
            $table->dropColumn('user_id');
            $table->bigInteger('owner_id')->nullable();
        });
        
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('tenant_property_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_user');
        
        Schema::table('properties', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->dropColumn('owner_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('tenant_property_id')->nullable();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('address');
            $table->text('description');
            $table->text('amenities');
            $table->text('regulation');
            $table->integer('number_of_units');
            $table->integer('rooms');
            $table->integer('bathrooms');
            $table->string('square_footage');
            $table->string('security_relief_available')->nullable();
            $table->text('pets');
            $table->text('owner_pays');
            $table->text('rent');
            $table->text('security');
            $table->text('comment');
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
        Schema::dropIfExists('properties');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiegeomgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siegeomgs', function (Blueprint $table) {
            $table->id();
            $table->integer('siege_id');
            $table->string('clientId')->unique();
            $table->string('clientSecret')->unique();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('siegeomgs');
    }
}

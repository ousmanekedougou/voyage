<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')->unique();
            $table->integer('place');
            $table->boolean('status')->default(0);
            $table->boolean('plein')->default(0);
            $table->integer('user_id');
            $table->integer('itineraire_id');
            $table->integer('siege_id');
            $table->integer('date_depart_id');
            $table->integer('inscrit')->nullable();
            $table->integer('number')->nullable();
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
        Schema::dropIfExists('buses');
    }
}

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
            $table->integer('itineraire_id');
            $table->integer('siege_id');
            $table->integer('user_id')->nullable();
            $table->integer('inscrit')->default(0);
            $table->integer('number')->nullable();
            $table->integer('montant')->nullable();
            $table->integer('valider')->nullable();
            $table->time('heure_rv');
            $table->time('heure_depart');
            $table->timestamps();
            
            // $table->foreign('itineraire_id')->references('id')->on('itineraires')->onDelete('cascade');
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

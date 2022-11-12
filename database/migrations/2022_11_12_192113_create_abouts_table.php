<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->longText('abaout')->nullable();
            $table->longText('motivation')->nullable();
            $table->longText('politic_ticket')->nullable();
            $table->longText('politic_bc')->nullable();
            $table->longText('politic_apte')->nullable();
            $table->longText('ville_arret')->nullable();
            $table->integer('agence_id');
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
        Schema::dropIfExists('abouts');
    }
}

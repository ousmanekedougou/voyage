<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDateDepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_departs', function (Blueprint $table) {
            $table->id();
            $table->date('depart_at');
            $table->time('depart_time');
            $table->time('rendez_vous');
            $table->integer('itineraire_id');
            $table->integer('siege_id');
            $table->string('name_of_day')->nullable();
            $table->integer('num_of_day')->nullable();
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
        Schema::dropIfExists('date_departs');
    }
}

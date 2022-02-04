<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBagagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bagages', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_phone')->unique();
            $table->string('client_ville');
            $table->integer('client_id');
            $table->integer('prix_total')->nullable();
            $table->integer('siege_id');
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
        Schema::dropIfExists('bagages');
    }
}

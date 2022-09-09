<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColiClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coli_clients', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->string('name_recept')->nullable();
            $table->integer('phone_recept')->nullable()->unique();
            $table->integer('prix');
            $table->text('detail');
            $table->integer('colie_id');
            $table->integer('siege_id');
            $table->integer('ville_id');
            $table->integer('customer_id')->nullable();
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
        Schema::dropIfExists('coli_clients');
    }
}

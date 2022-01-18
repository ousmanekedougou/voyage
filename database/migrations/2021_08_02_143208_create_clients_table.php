<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique();
            $table->integer('ville_id');
            $table->integer('bus_id');
            $table->integer('position')->nullable();
            $table->integer('amount')->nullable();
            $table->dateTime('registered_at')->nullable();
            $table->time('heure')->nullable();
            $table->date('payment_at')->nullable();
            $table->string('cni')->nullable();
            $table->integer('remboursement')->nullable();
            $table->integer('voyage_status')->default(0);
            $table->string('confirmation_token')->nullable();
            $table->string('agence')->nullable();
            $table->string('agence_logo')->nullable();
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
        Schema::dropIfExists('clients');
    }
}

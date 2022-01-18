<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicals', function (Blueprint $table) {
            $table->id();
             $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('ville_name');
            $table->string('bus_matricule');
            $table->integer('position')->nullable();
            $table->integer('amount')->nullable();
            $table->date('registered_at')->nullable();
            $table->time('heure')->nullable();
            $table->date('payment_at')->nullable();
            $table->string('cni')->nullable();
            $table->integer('remboursement')->nullable();
            $table->integer('voyage_status')->default(0);
            $table->dateTime('confirmation_token')->nullable();
            $table->string('agence')->nullable();
            $table->string('agence_logo')->nullable();
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
        Schema::dropIfExists('historicals');
    }
}

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
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->integer('phone')->unique()->nullable();
            $table->integer('ville_id')->nullable();
            $table->integer('bus_id')->nullable();
            $table->integer('position')->nullable();
            $table->integer('amount')->nullable();
            $table->date('registered_at')->nullable();
            $table->date('payment_at')->nullable();
            $table->integer('remboursement')->nullable();
            $table->boolean('voyage_status')->default(0);
            $table->integer('siege_id');
            $table->string('cni')->unique()->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('prix_total')->nullable();
            $table->integer('status')->default(0);
            $table->date('canceled_at')->nullable();
            $table->time('canceled_time')->nullable();
            $table->integer('payment_methode')->nullable();
            // $table->integer('reference')->unique()->nullable();
            // $table->string('image')->nullable();
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

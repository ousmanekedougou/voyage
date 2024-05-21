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
            $table->integer('reference')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->integer('phone')->unique()->nullable();
            $table->string('cni')->unique()->nullable();
            $table->integer('siege_id');
            $table->integer('customer_id')->nullable();
            $table->integer('ville_id')->nullable();
            $table->integer('bus_id')->nullable();
            $table->integer('position')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('remboursement')->nullable();
            $table->integer('payment_methode')->nullable();
            $table->integer('status')->default(0);
            $table->boolean('voyage_status')->default(0);
            $table->boolean('has_bagage')->default(0);
            $table->dateTime('registered_at')->nullable();
            $table->date('payment_at')->nullable();
            $table->date('canceled_at')->nullable();
            $table->time('canceled_time')->nullable();
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

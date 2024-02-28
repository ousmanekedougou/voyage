<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->unsignedBigInteger('agent_id');
            $table->foreign('agent_id')->references('id')->on('agents');
            $table->dateTime('launch_date');
            $table->dateTime('done_time');
            $table->string('amount');
            $table->enum('status',['SUCCESS','FAILED'])->default('SUCCESS');
            $table->enum('month',[
                'JANVIER', 'FEVRIER' , 'MARS' , 'AVRIL' , 'MAI' , 'JUIN' , 'JUILLET' , 'AOUT',
                'SEPTEMBRE' , 'OCTOBRE' , 'NOVEMBRE' , 'DECEMBRE'
            ]);
            $table->string('year');
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
        Schema::dropIfExists('payments');
    }
}

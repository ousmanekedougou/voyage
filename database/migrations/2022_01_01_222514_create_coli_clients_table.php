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
            $table->integer('phone_recept')->nullable();
            $table->integer('prix');
            $table->integer('prix_total');
            $table->text('detail');
            $table->integer('colie_id');
            $table->integer('siege_id');
            $table->integer('ville_id');
            $table->integer('quantity')->nullable();
            $table->integer('customer_id')->nullable();
            $table->boolean('status')->default(false)->nullable();
            $table->integer('recepteurPay')->default(0);
            $table->string('recepteurPayAmount')->nullable();
            $table->string('code_validation')->unique()->nullable();
            $table->boolean('recu')->default(false)->nullable();
            $table->string('recepteur_info')->default(0);
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agences', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('adress')->nullable();
            $table->string('registre_commerce')->unique()->nullable();
            $table->text('slogan')->nullable();
            $table->string('logo')->nullable();
            $table->integer('status')->default(0);
            $table->string('password');
            $table->boolean('is_active')->default(0);
            $table->integer('is_admin')->default(0);
            $table->string('slug')->unique();
            $table->string('facture')->nullable();
            $table->string('amount')->nullable();
            $table->dateTime('payment_at')->nullable();
            $table->integer('user_id');
            $table->integer('siege_id')->nullable();
            $table->string('confirmation_token')->unique()->nullable();
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
        Schema::dropIfExists('agences');
    }
}

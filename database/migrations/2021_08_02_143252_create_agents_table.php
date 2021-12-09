<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('adress')->nullable();
            $table->integer('status')->default(0);
            $table->string('password');
            $table->boolean('is_active')->default(0);
            $table->integer('is_admin')->default(1);
            $table->string('slug')->unique();
            $table->integer('agence_id')->nullable();
            $table->integer('siege_id')->nullable();
            $table->string('confirmation_token')->unique()->nullable();
             $table->string('image')->nullable();
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
        Schema::dropIfExists('agents');
    }
}

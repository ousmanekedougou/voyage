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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('adress')->nullable();
            $table->string('registre_commerce')->unique()->nullable();
            $table->text('slogan')->nullable();
            $table->integer('status')->default(0);
            $table->string('password');
            $table->boolean('is_active')->default(0);
            $table->boolean('is_admin')->default(1);
            $table->string('slug')->unique();
            $table->string('facture')->nullable();
            $table->string('amount')->nullable();
            $table->integer('payment_at')->nullable();
            // $table->integer('user_id')->nullable();
            $table->integer('region_id');
            $table->string('confirmation_token')->unique()->nullable();
            $table->string('logo')->nullable();
            $table->boolean('method_ticket')->default(1);
            $table->boolean('terme')->default(0);
            //  $table->string('image')->nullable();
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

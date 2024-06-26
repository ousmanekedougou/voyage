<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique();
            $table->string('qrcode')->unique()->nullable();
            $table->string('cni')->nullable()->unique();
            $table->string('confirmation_token')->nullable();
            $table->integer('region_id');
            $table->integer('is_admin');
            $table->integer('is_active')->default(0);
            $table->string('slug')->unique()->nullable();
            $table->string('image')->nullable();
            $table->boolean('terme')->default(0);
            $table->string('password');
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
        Schema::dropIfExists('customers');
    }
}

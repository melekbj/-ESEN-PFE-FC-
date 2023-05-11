<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('role')->nullable();
            $table->string('num');
            $table->string('avatar')->nullable();
            $table->unsignedBigInteger('idSpec')->nullable();
            $table->unsignedBigInteger('idVille')->nullable();
            $table->boolean('approved')->default(0)->nullable();
            $table->boolean('block')->default(0)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            //  $table->foreign('specialite_id')
            //  ->references('id')
            //  ->on('specialites')
            //  ->onDelete('cascade');
            



            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

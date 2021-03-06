<?php

//Edited by: Simón Flórez Silva

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->date('dateOfBirth');
            $table->string('phoneNumber')->nullable();
            $table->string('learningStyle');
            $table->string('userKind')->default('non-prime');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->default('/img/missing.jpeg');
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
}

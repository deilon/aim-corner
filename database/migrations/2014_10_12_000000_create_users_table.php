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
            $table->string('username', 100)->unique()->nullable();
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('city', 100);
            $table->string('country', 100);
            $table->string('photo', 255);
            $table->string('course', 100)->nullable();
            $table->enum('role', ['admin', 'instructor', 'student']);
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

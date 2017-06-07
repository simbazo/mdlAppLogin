<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('uuid',36)->primary()->unique();
            $table->string('first_name');
            $table->string('last_name'); 
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('username')->nullable()->unique();
            $table->string('email')->unique()->unique();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('pobox')->nullable();
            $table->string('client_id')->nullable();//uuid to identify user on login
            $table->boolean('active')->default(false);
            $table->string('user_created',36)->nullable();
            $table->string('user_updated',36)->nullable();
            $table->string('user_deleted',36)->nullable();
            $table->softDeletes();
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migration to create the users table.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('uuid',36)->primary()->unique();
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('dob')->nullable(false);
            $table->string('sex',36)->nullable(false);
            $table->string('secret_question')->nullable(false);
            $table->string('secret_answer')->nullable(false);
            $table->string('email')->nullable(false)->unique();
            $table->string('mobile')->nullable()->unique();
            $table->string('password')->nullable(false);            
            $table->string('user_created',36)->nullable();
            $table->string('user_updated',36)->nullable();
            $table->string('user_deleted',36)->nullable();
            $table->softDeletes();            
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migration and drop the users table.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

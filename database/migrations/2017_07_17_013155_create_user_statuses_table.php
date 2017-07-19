<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserStatusesTable extends Migration
{
    /**
     * Run the migration to create a user_statuses table.
     *
     * @return void
     */
    public function up()
    {
        schema::create('user_statuses', function (Blueprint $table) {
            $table->increments('uuid');
            $table->string('status')->unique()->nullable(false);
            $table->boolean('active')->nullable(false)->default(1);
            $table->integer('user_created')->nullable();
            $table->integer('user_updated')->nullable();
            $table->integer('user_deleted')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

     /**
     * Reverse the user_statuses migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_statuses');
    }
}

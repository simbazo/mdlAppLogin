<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licences', function (Blueprint $table) {
            $table->increments('uuid');
            $table->string('type')->nullable(false);
            $table->text('terms')->nullable();
            $table->integer('upload_schedule')->nullable(false)->default(30);
            $table->integer('download_schedule')->nullable(false)->default(60);
            $table->integer('user_created')->unsigned()->nullable();
            $table->integer('user_updated')->unsigned()->nullable();
            $table->integer('user_deleted')->unsigned()->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('licences');
    }
}
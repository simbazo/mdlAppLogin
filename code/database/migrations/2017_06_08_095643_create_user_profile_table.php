<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->string('uuid',36)->primary()->unique();
            $table->string('user_id',36)->nullable(false);
            $table->string('first_name')->nullable(false);;
            $table->string('last_name')->nullable(false);; 
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();            
            $table->string('phone')->nullable()->unique();            
            $table->string('email')->nullable()->unique();
            $table->string('physical_address')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city_id')->nullable();
            $table->string('province_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('avatar')->nullable();
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
        Schema::dropIfExists('user_profiles');
    }
}

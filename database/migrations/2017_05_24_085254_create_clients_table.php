<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('uuid');
            $table->string('short_name')->unique()->nullable(false);
            $table->string('long_name')->unique()->nullable();            
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('cell')->nullable();            
            $table->integer('country_uuid')->unsigned()->nullable(false);
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('postal_code')->nullable(false);            
            $table->string('contact_person_fname')->nullable();
            $table->string('contact_person_lname')->nullable();
            $table->string('contact_person_email')->nullable();
            $table->string('contact_person_cell')->nullable();            
            $table->string('user_created')->nullable();
            $table->string('user_updated')->nullable();
            $table->string('user_deleted')->nullable();
            $table->softDeletes();
            $table->timestamps();

            //$table->foreign('country_uuid')->references('uuid')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}

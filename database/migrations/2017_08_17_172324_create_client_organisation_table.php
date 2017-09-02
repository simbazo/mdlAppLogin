<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientOrganisationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_organisation', function (Blueprint $table) {
            $table->integer('client_uuid')->unsigned()->nullable(false);
            $table->integer('organisation_uuid')->unsigned()->nullable(false);

            $table->foreign('client_uuid')->references('uuid')->on('clients')->onDelete('cascade');
            $table->foreign('organisation_uuid')->references('uuid')->on('organisations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_organisation');
    }
}

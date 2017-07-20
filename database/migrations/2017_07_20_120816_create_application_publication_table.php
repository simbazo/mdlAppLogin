<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationPublicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_publication', function (Blueprint $table) {
            $table->integer('application_uuid')->unsigned();
            $table->integer('publication_uuid')->unsigned();

            $table->foreign('application_uuid')->references('uuid')->on('applications')->onDelete('cascade');
            $table->foreign('publication_uuid')->references('uuid')->on('publications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_publication');
    }
}

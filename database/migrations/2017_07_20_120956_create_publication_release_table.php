<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationReleaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_release', function (Blueprint $table) {
            $table->integer('publication_uuid')->unsigned();
            $table->integer('release_uuid')->unsigned();
            
            $table->foreign('publication_uuid')->references('uuid')->on('publications')->onDelete('cascade');
            $table->foreign('release_uuid')->references('uuid')->on('releases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publication_release');
    }
}

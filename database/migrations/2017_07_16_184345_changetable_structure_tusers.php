<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangetableStructureTusers extends Migration
{
    /**
     * Run the migration to update the tusers table.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('dob')->nullable(false)->change(); //CHANGED dob FROM STRING TO DATE
            $table->integer('sex_uuid')->nullable(false)->change();//CHANGED sex FROM STRING TO INTEGER SO IT BECOMES A LOOKUP TO A tSex TABLE - DB NORMALISATION 
            $table->string('email')->unique()->nullable(false)->change(); 
            $table->string('mobile')->unique()->nullable(false)->change();
            $table->renameColumn('secret_question', 'security_question');
            $table->renameColumn('secret_answer', 'security_answer'); 
            $table->integer('status_uuid')->nullable(false);//ADDED THIS AS A LOOKUP TO A tStaus TABLE
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

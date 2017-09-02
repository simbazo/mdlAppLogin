<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_subscription', function (Blueprint $table) {
            $table->integer('device_uuid')->unsigned()->nullable(false);
            $table->integer('subscription_uuid')->unsigned()->nullable(false);

            $table->foreign('device_uuid')->references('uuid')->on('devices')->onDelete('cascade');
            $table->foreign('subscription_uuid')->references('uuid')->on('subscriptions')->onDelete('cascade');        

            $table->unique(['device_uuid', 'subscription_uuid']);    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_subscription');
    }
}

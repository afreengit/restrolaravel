<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordermasters', function (Blueprint $table) {
            $table->increments('om_id');
             $table->integer('om_u_id')->unsigned()->nullable();
            $table->index('om_u_id');
            $table->foreign('om_u_id')->references('u_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->float('om_totalprice');
             $table->integer('om_deliveryboy_id')->unsigned()->nullable();
            $table->index('om_deliveryboy_id');
            $table->foreign('om_deliveryboy_id')->references('dl_id')->on('deliveryboys')->onDelete('cascade')->onUpdate('cascade');
            $table->string('om_paymentmode');
            $table->integer('om_phone');
            $table->string('om_address');
            $table->string('om_location');
            $table->tinyInteger('om_paymentstatus');
            $table->tinyInteger('om_orderstatus');
            $table->tinyInteger('om_cancelled');

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
        Schema::dropIfExists('ordermasters');
    }
};

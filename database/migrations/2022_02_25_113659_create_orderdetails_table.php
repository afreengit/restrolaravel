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
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->increments('od_id');

            $table->integer('om_id')->unsigned()->nullable();
            $table->index('om_id');
            $table->foreign('om_id')->references('om_id')->on('ordermasters')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('dd_id')->unsigned()->nullable();
            $table->index('dd_id');
            $table->foreign('dd_id')->references('dd_id')->on('dishdetails')->onDelete('cascade')->onUpdate('cascade');
            
            $table->float('od_price');
            $table->float('od_quantity');
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
        Schema::dropIfExists('orderdetails');
    }
};

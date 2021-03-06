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
        Schema::create('orderstatus', function (Blueprint $table) {
            $table->increments('os_id')->unsigned();

            $table->tinyInteger('os_status')->unsigned()->nullable();
            $table->foreign('os_status')->references('om_orderstatus')->on('ordermasters')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('orderstatus');
    }
};

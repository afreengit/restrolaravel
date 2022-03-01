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
        Schema::create('dishcarts', function (Blueprint $table) {
            $table->increments('dc_id')->unsigned();

            $table->integer('u_id')->unsigned();
            $table->index('u_id');
            $table->foreign('u_id')->references('u_id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('dd_id')->unsigned();
            $table->index('dd_id');
            $table->foreign('dd_id')->references('dd_id')->on('dishdetails')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('qty');
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
        Schema::dropIfExists('dishcarts');
    }
};

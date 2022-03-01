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
        Schema::create('dishdetails', function (Blueprint $table) {
            $table->increments('dd_id')->unsigned();
            $table->string('dd_dish');
            $table->string('dd_portion');
            $table->float('dd_offerprice')->nullable();
            $table->float('dd_price');
            $table->tinyInteger('dd_status')->default('1');
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
        Schema::dropIfExists('dishdetails');
    }
};

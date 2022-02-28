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
            $table->increments('dd_id')->unsigned()->unique();
            $table->string('dd_dish');
            $table->string('dd_portion');
            $table->float('dd_offerprice');
            $table->float('dd_price');
            $table->tinyInteger('dd_status');
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

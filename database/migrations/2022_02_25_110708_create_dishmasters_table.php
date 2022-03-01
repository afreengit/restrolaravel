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
        Schema::create('dishmasters', function (Blueprint $table) {
            $table->increments('dm_id')->unsigned();
            
            $table->integer('ct_id')->unsigned()->nullable();
            $table->index('ct_id');
            $table->foreign('ct_id')->references('ct_id')->on('categorys')->onDelete('cascade')->onUpdate('cascade');
            $table->string('dm_name');
            $table->string('dm_description');
            $table->tinyInteger('dm_type');
            $table->string('dm_image');
            $table->tinyInteger('dm_status')->default('1');
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
        Schema::dropIfExists('dishmasters');
    }
};

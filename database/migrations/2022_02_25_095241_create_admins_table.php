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
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('ad_id');
            $table->string('ad_uname');
            $table->string('ad_pwd');
            $table->string('ad_email')->unique();
            $table->integer('ad_phone');
            $table->tinyInteger('ad_type');
            $table->tinyInteger('ad_status');
            $table->dateTime('ad_lastlogin');
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
        Schema::dropIfExists('admins');
    }
};

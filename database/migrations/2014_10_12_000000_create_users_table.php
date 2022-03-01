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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('u_id')->unsigned();
            $table->string('u_name');
            $table->string('u_email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('u_password');
            $table->integer('u_phone');
            $table->string('u_home_address')->nullable();
            $table->string('u_office_address')->nullable();
            $table->tinyInteger('u_status')->default('1');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

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
        Schema::table('dishdetails', function (Blueprint $table) {
            
            $table->integer('dm_id')->unsigned()->nullable()->after('dd_id');
            $table->index('dm_id');
            $table->foreign('dm_id')->references('dm_id')->on('dishmasters')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dishdetails', function (Blueprint $table) {
            $table->dropForeign('dishdetails_dm_id_foreign');
            $table->dropColumn('dm_id');
        });
    }
};

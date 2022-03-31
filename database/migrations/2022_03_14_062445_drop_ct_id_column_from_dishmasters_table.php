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
        Schema::table('dishmasters', function (Blueprint $table) {
        
            $table->dropForeign('dishmasters_ct_id_foreign');
            $table->dropColumn('ct_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dishmasters', function (Blueprint $table) {
            //
        });
    }
};

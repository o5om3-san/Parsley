<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClosedToOtsukaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('otsukais', function (Blueprint $table) {
            $table->integer('closed')->default(0)->after('deliverPlace');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('otsukais', function (Blueprint $table) {
            $table->dropColumn('closed');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtsukaiGiantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otsukai_giant', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('otsukai_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('item_id')->unsigned()->index();
            $table->integer('amount');
            $table->string('comment',191);
            $table->timestamps();
            
            //foreign key settings
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('otsukai_id')->references('id')->on('otsukais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('otsukai_giant');
    }
}

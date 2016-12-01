<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->date('expire');
            $table->timestamps();
        });
        
        Schema::table('order', function ($table) {
            $table->integer('user_id')->unsigned();
            $table->integer('menu_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('menu_id')->references('id')->on('menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order');
    }
}

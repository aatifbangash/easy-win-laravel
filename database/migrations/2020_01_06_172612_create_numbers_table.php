<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numbers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('game_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('number')->nullable();
            $table->string('status')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('numbers');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_room', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('feature_id')->unsigned();
            $table->integer('room_id')->unsigned();

            $table->foreign('feature_id')
                ->references('id')->on('features');
            $table->foreign('room_id')
                ->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('feature_room');
    }
}

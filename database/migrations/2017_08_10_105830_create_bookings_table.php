<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->unsignedInteger('room_id');
            $table->unsignedInteger('user_id');
            $table->date('check_in')->nullable();
            $table->date('check_out')->nullable();
            //primary key.
            $table->primary(['user_id','room_id','check_in']);
            $table->timestamps();
        });

        Schema::table('bookings', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}

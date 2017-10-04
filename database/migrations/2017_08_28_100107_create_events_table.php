<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->boolean('priority');
            $table->integer('user_id');
            $table->string('title');
            $table->string('location');
            $table->float('lat');
            $table->float('lng');
            $table->dateTime('time_start');
            $table->dateTime('time_end');
            $table->string('image');
            $table->string('keyword');
            $table->text('description');
            $table->string('ticket');
            $table->timestamps();

//            $table->foreign('user_id')
//                ->references('id')
//                ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}

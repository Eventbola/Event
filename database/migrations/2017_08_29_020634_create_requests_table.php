<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('event_user_event_id')->unsigned();
            $table->integer('user_inviter_id')->unsigned();
            $table->integer('user_invited_id')->unsigned();
            $table->string('activity');
            $table->timestamps();

            $table->foreign('event_user_event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');
            $table->foreign('user_inviter_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('user_invited_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}

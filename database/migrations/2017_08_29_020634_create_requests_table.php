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
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');

            $table->integer('user_inviter_id')->unsigned();
            $table->foreign('user_inviter_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->integer('user_invited_id')->unsigned();
            $table->foreign('user_invited_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->boolean('confirmed')->default(0);
            $table->string('token', 254)->nullable;
            $table->rememberToken();
            $table->timestamps();

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

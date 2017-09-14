<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_active_id')->unsigned();
            $table->integer('user_passive_id')->unsigned();
            $table->string('active');
            $table->timestamps();

            $table->foreign('user_passive_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('user_active_id')
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
        Schema::dropIfExists('notifications');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('meeting_hold');
            $table->string('location');
            $table->date('date');
            $table->string('start_time');
            $table->string('duration');
            $table->integer('men')->unsigned();
            $table->integer('women')->unsigned();
            $table->integer('children')->unsigned();
            $table->text('highlights');
            $table->integer('guest')->unsigned();
            $table->text('guest_details');
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
        Schema::dropIfExists('attendances');
    }
}

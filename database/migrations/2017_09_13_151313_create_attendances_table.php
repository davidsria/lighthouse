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

         Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
            $table->string('year');
            $table->timestamps();
        });


        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('meeting_hold');
            $table->string('location');
            $table->integer('report_id')->unsigned()->index();
                $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
            $table->integer('day');
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
        Schema::dropIfExists('reports');
    }
}

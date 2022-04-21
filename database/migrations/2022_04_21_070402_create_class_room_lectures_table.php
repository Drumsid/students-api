<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoomLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_room_lectures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_room_id');
            $table->unsignedBigInteger('lecture_id');
            $table->foreign('class_room_id')->references('id')->on('class_rooms')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('lecture_id')->references('id')->on('lectures')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('class_room_lectures');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
        $table->increments('id');
        $table->timestamps();
        $table->integer('studentId')->unsigned();
        $table->foreign('studentId')->references('id')->on('student');
        $table->integer('assignmentId')->unsigned();
        $table->foreign('assignmentId')->references('id')->on('assignment');
        $table->integer('score');
        $table->integer('courseId')->unsigned();
        $table->foreign('courseId')->references('id')->on('course');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report');
    }
}

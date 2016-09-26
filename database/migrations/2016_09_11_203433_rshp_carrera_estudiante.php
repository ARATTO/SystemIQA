<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RshpCarreraEstudiante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('carrera_estudiante' , function (Blueprint $table){
          $table->increments('id');

          $table->integer('estudiante_id')->unsigned();
          $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');

          $table->integer('carrera_id')->unsigned();
          $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');

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
        //
        Schema::drop('carrera_estudiante');
    }
}

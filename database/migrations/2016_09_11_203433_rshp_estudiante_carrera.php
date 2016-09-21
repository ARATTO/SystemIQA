<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RshpEstudianteCarrera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('estudiante_carrera' , function (Blueprint $table){
          $table->increments('id');

          $table->string('estudiante_id');
          $table->foreign('estudiante_id')->references('carnet')->on('estudiantes')->onDelete('cascade');

          $table->string('carrera_id');
          $table->foreign('carrera_id')->references('codigo')->on('carreras')->onDelete('cascade');

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
        Schema::drop('estudiante_carrera');
    }
}

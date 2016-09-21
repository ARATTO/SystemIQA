<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RshpCarreraMateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('carrera_materia', function(Blueprint $table){
          $table->increments('id');

          $table->string('carrera_id');
          $table->foreign('carrera_id')->references('codigo')->on('carreras')->onDelete('cascade');

          $table->string('materia_id');
          $table->foreign('materia_id')->references('codigo')->on('materias')->onDelete('cascade');

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
        Schema::drop('carrera_materia');
    }
}

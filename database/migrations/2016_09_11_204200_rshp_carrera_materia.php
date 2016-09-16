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

          $table->integer('carrera_id')->unsigned();
          $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');

          $table->integer('materia_id')->unsigned();
          $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');

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
        Schema::drop('carrera_materia');
    }
}

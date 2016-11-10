<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RshpCicloMateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ciclo_materia' , function (Blueprint $table){
          $table->increments('id');

          $table->integer('materia_id')->unsigned();
          $table->foreign('materia_id')->references('id')->on('materias_inscritas')->onDelete('cascade');

          $table->integer('ciclo_id')->unsigned();
          $table->foreign('ciclo_id')->references('id')->on('ciclos')->onDelete('cascade');

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
        Schema::drop('ciclo_materia');
    }
}

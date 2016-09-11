<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RshpMateriaCiclo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('materia_ciclo' , function (Blueprint $table){
          $table->increments('id');

          $table->string('materia_id');
          $table->foreign('materia_id')->references('codigo')->on('materias')->onDelete('cascade');

          $table->string('ciclo_id');
          $table->foreign('ciclo_id')->references('codigo')->on('ciclos')->onDelete('cascade');

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
        Schema::drop('materia_ciclo');
    }
}

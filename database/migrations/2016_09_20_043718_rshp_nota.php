<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RshpNota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('notas', function(Blueprint $table){
        $table->integer('evaluacion_id')->unsigned();
        $table->foreign('evaluacion_id')->references('id')->on('evaluaciones')->onDelete('cascade');

        $table->integer('materiaInscrita_id')->unsigned();
        $table->foreign('materiaInscrita_id')->references('id')->on('materias_inscritas')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('notas', function(Blueprint $table){
        $table->dropForeign(['evaluacion_id']);
        $table->dropForeign(['materiaInscrita_id']);
      });
    }
}

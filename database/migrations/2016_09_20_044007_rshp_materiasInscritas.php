<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RshpMateriasInscritas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('materias_inscritas', function(Blueprint $table){
        $table->integer('estudiante_id')->unsigned();
        $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');

        $table->integer('materia_id')->unsigned();
        $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
        
        $table->integer('ciclo_id')->unsigned();
        $table->foreign('ciclo_id')->references('id')->on('ciclos')->onDelete('cascade');

        $table->integer('grupo_id')->unsigned();
        $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('materias_inscritas', function(Blueprint $table){
        $table->dropForeign(['estudiante_id']);
        $table->dropForeign(['materia_id']);
        $table->dropForeign(['ciclo_id']);
        $table->dropForeign(['grupo_id']);
      });
    }
}

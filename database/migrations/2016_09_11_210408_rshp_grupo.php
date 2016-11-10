<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RshpGrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('grupos', function(Blueprint $table){
          $table->integer('materia_id')->unsigned();
          $table->foreign('materia_id')->references('id')->on('materias_inscritas')->onDelete('cascade');

          $table->integer('tipoGrupo_id')->unsigned();
          $table->foreign('tipoGrupo_id')->references('id')->on('tipo_grupos')->onDelete('cascade');
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
        Schema::table('grupos', function(Blueprint $table){
          $table->dropForeign(['materia_id']);
          $table->dropForeign(['tipoGrupo_id']);
        });
    }
}

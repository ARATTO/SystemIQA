<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RshpGrupoTutoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('grupo_tutorias', function(Blueprint $table){
            $table->integer('tutor_id')->unsigned();
            $table->foreign('tutor_id')->references('id')->on('tutores')->onDelete('cascade');

            $table->integer('materia_id')->nullable()->unsigned();
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');

            $table->integer('ciclo_id')->nullable()->unsigned();
            $table->foreign('ciclo_id')->references('id')->on('ciclos')->onDelete('cascade');
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
        Schema::table('grupo_tutorias', function (Blueprint $table) {
          $table->dropForeign(['tutor_id']);
          $table->dropForeign(['materia_id']);
          $table->dropForeign(['ciclo_id']);
        });
    }
}

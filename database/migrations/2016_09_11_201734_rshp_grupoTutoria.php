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

            $table->string('estudiante_id');
            $table->foreign('estudiante_id')->references('carnet')->on('estudiantes')->onDelete('cascade');
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
          $table->dropForeign(['estudiante_id']);
        });
    }
}

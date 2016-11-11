<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRshpEstudiante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudiantes', function(Blueprint $table) {
            $table->integer('grupoAsesoria_id')->nullable()->unsigned();
            $table->foreign('grupoAsesoria_id')->references('id')->on('grupo_asesoria')->onDelete('cascade');

            $table->integer('grupoTutoria_id')->nullable()->unsigned();
            $table->foreign('grupoTutoria_id')->references('id')->on('grupo_tutorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estudiantes', function(Blueprint $table) {
            $table->dropForeign(['grupoAsesoria_id']);
            $table->dropForeign(['grupoTutoria_id']);
        });
    }
}

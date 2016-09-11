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
        Schema::table('grupos', function(Blueprint $table){
          $table->dropForeign(['materia_id']);
        });
    }
}

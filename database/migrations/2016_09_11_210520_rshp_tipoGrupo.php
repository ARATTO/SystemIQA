<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RshpTipoGrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tipo_grupos', function(Blueprint $table){
          $table->string('grupo_id');
          $table->foreign('grupo_id')->references('codigo')->on('grupos')->onDelete('cascade');
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
        Schema::table('tipo_grupos', function(Blueprint $table){
          $table->dropForeign(['grupo_id']);
        });
    }
}

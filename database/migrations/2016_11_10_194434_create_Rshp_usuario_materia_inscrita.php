<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRshpUsuarioMateriaInscrita extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('usuario_materiainscrita', function(Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('materia_inscrita_id')->unsigned();
            $table->foreign('materia_inscrita_id')->references('id')->on('materias_inscritas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('usuario_materiainscrita', function(Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['materia_inscrita_id']);
        });
    }

}

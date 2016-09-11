<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RshpUserMateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_materia', function (Blueprint $table) {
          $table->increments('id');

          $table->string('materia_id'); //Codigo de materia
          $table->foreign('materia_id')->references('codigo')->on('materias')->onDelete('cascade');

          $table->string('usuario_id'); //Codigo de usuario
          $table->foreign('usuario_id')->references('carnet')->on('users')->onDelete('cascade');

          $table->timestamps();
        });

        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('user_materia');
    }
}

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
        Schema::create('materia_user', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('materia_id')->unsigned(); //Codigo de materia
          $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');

          $table->integer('user_id')->unsigned(); //Codigo de usuario
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
      Schema::drop('materia_user');
    }
}

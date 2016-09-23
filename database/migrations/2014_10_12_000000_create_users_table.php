<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('carnet')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->string('foto');
            //Pienso aqui debe ir los roles por enum
                /*
            $table->string('codigo_id'); //Codigo de materias
            $table->foreign('codigo_id')->references('codigo')->on('materias');
              */

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}

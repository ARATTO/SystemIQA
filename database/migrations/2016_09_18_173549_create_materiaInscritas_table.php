<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriaInscritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MateriasInscritas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cursada');
            $table->float('nota_final');
            $table->integer('alumno_id_')->unsigned();
            $table->integer('mat_id')->unsigned();


            //llaves foraneas
            $table->integer('alumno_id')->references('id')->on('estudiantes')->onDelete('cascade');
            $table->integer('mat_id')->references('id')->on('materias')->onDelete('cascade');
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
        Schema::drop('MateriasInscritas');
    }
}


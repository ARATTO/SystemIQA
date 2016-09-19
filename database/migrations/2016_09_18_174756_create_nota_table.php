<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id');
            $table->float('nota');
            $table->integer('materiaInscrita_id')->unsigned();
            $table->integer('evaluacion_id')->unsigned();
            
            //llaves foraneas
            $table->integer('materiaInscrita_id')->references('id')->on('MateriasInscritas')->onDelete('cascade');
            $table->integer('evaluacion_id')->references('id')->on('evaluaciones')->onDelete('cascade');

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
        Schema::drop('notas');
    }
}

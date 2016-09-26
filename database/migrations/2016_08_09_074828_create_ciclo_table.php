<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCicloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciclos', function (Blueprint $table) {
<<<<<<< HEAD
            $table->string('codigo')->primary();
=======
            $table->increments('id');
            $table->string('codigo')->unique();
>>>>>>> 306af1106b3fbd6ee19e8feb91235927940aa452
            $table->string('ciclo_academico');
            $table->integer('anio_academico');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
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
        Schema::drop('ciclos');
    }
}

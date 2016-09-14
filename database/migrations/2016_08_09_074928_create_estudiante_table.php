<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('carnet')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('materias_ganadas');
            $table->integer('materias_reprobadas');
            $table->float('CUM');
            $table->date('anio_ingreso');
            $table->float('promedio_ciclo');

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
        Schema::drop('estudiantes');
    }
}

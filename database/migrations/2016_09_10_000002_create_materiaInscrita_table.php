<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriaInscritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('materias_inscritas', function (Blueprint $table) {
          $table->increments('id');
          $table->string('cursada');
          $table->float('nota_final');
          $table->integer('activa');
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
        Schema::drop('materias_inscritas');
    }
}

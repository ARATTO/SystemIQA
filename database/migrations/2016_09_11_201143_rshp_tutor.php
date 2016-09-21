<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RshpTutor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //
      Schema::table('tutores', function (Blueprint $table) {

        $table->string('usuario_id'); //Codigo de tutores
        $table->foreign('usuario_id')->references('carnet')->on('users')->onDelete('cascade');
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
      Schema::table('tutores', function (Blueprint $table) {
        $table->dropForeign(['usuario_id']);
      });
    }
}

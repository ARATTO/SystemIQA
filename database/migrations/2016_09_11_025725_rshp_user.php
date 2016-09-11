<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RshpUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {

          $table->integer('rol_id')->unsigned(); //Codigo de rol
          $table->foreign('rol_id')->references('id')->on('rols')->onDelete('cascade');

          $table->string('tutor_id'); //Codigo de tutores
          $table->foreign('tutor_id')->references('codigo')->on('tutores')->onDelete('cascade');
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
        Schema::table('users', function (Blueprint $table) {
          $table->dropForeign(['rol_id']);
          $table->dropForeign(['tutor_id']);
        });
    }
}

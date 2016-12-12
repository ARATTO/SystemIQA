<?php

use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('carreras')->insert([
            'codigo' => 'I10511',
            'nombre' => 'Ingenieria en Alimentos',
            'descripcion' => 'ingenieria de alimentos',
            ]);

		DB::table('carreras')->insert([
            'codigo' => 'I10516',
            'nombre' => 'Ingenieria Quimica',
            'descripcion' => 'ingenieria quimica',
            ]);
}

}
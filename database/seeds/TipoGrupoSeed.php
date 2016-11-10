<?php

use Illuminate\Database\Seeder;

class TipoGrupoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_grupos')->insert([
            'nombre' => 'Teorico',
            'descripcion' => 'Imparten clases',
        ]);
        DB::table('tipo_grupos')->insert([
            'nombre' => 'Discusion',
            'descripcion' => 'Discusiones',
        ]);
        DB::table('tipo_grupos')->insert([
            'nombre' => 'Laboratorio',
            'descripcion' => 'Laboratorio',
        ]);
    }
}

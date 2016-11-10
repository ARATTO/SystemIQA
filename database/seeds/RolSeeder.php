<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
            'nombre' => 'Jefe Escuela',
            'descripcion' => 'Es el encargado de administrar la escuela.',
        ]);
        DB::table('rols')->insert([
            'nombre' => 'Docente',
            'descripcion' => 'Es el encargado de impartir las clases en su materia asignada.',
        ]);
        DB::table('rols')->insert([
            'nombre' => 'Coordinador Catedra',
            'descripcion' => 'Es el encargado de coordinar la materia asignada.',
        ]);
        DB::table('rols')->insert([
            'nombre' => 'Coordinador Proyecto Graduacion',
            'descripcion' => 'Es el encargado de los proyectos de graduacion.',
        ]);
        DB::table('rols')->insert([
            'nombre' => 'Coordinador Proyeccion Social',
            'descripcion' => 'Es el encargado de proyeccion social.',
        ]);
        DB::table('rols')->insert([
            'nombre' => 'Secretaria',
            'descripcion' => 'Es la secretaria de la escuela.',
        ]);

    }
}

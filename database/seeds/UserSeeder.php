<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'carnet' => 'AM11098',
            'nombre' => 'Dario Roman',
            'apellido' => 'Araya Motto',
            'password' => bcrypt('AM11098'),
            'email' => 'am11098@ues.edu.sv',
            'telefono' => '7777-7777',
            'foto' => 'eternoslimpio.jpg',
            'rol_id' => '1',
        ]);
        DB::table('users')->insert([
            'carnet' => 'SR11038',
            'nombre' => 'Rodrigo Daniel',
            'apellido' => 'Segovia Romero',
            'password' => bcrypt('SR11038'),
            'email' => 'sr11038@ues.edu.sv',
            'telefono' => '7777-7777',
            'foto' => 'eternoslimpio.jpg',
            'rol_id' => '1',
        ]);
        DB::table('users')->insert([
            'carnet' => 'LC13001',
            'nombre' => 'Bryan Lobos',
            'apellido' => 'Cruz',
            'password' => bcrypt('LC13001'),
            'email' => 'lc13001@ues.edu.sv',
            'telefono' => '7777-7777',
            'foto' => 'eternoslimpio.jpg',
            'rol_id' => '1',
        ]);
        DB::table('users')->insert([
            'carnet' => 'LL13002',
            'nombre' => 'Alam Lopez',
            'apellido' => 'Lopez',
            'password' => bcrypt('LL13002'),
            'email' => 'll13002@ues.edu.sv',
            'telefono' => '7777-7777',
            'foto' => 'eternoslimpio.jpg',
            'rol_id' => '1',
        ]);
        DB::table('users')->insert([
            'carnet' => 'BV13003',
            'nombre' => 'Elias Barrera',
            'apellido' => 'Barrera',
            'password' => bcrypt('BV13003'),
            'email' => 'bv13003@ues.edu.sv',
            'telefono' => '7777-7777',
            'foto' => 'eternoslimpio.jpg',
            'rol_id' => '1',
        ]);

    }
}

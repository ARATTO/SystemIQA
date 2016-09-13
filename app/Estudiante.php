<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    //
    protected $table = 'estudiantes';

    protected $fillable = [
        'carnet',
        'nombre',
        'apellido',
        'materias_ganadas',
        'materias_reprobadas',
        'CUM',
        'anio_ingreso',
        'promedio_ciclo',
        'descripcion',
    ];

    public function grupo_tutorias(){
      return $this->hasMany('App\GrupoTutoria');
    }
}

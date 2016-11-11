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
    ];


    public function carreras(){
      return $this->belongsToMany('App\Carrera')->withTimestamps();
    }


    public function materiaInscrita(){
      return $this->hasMany('App\MateriaInscrita');
    }

   public function grupo_tutorias(){
      return $this->hasMany('App\GrupoTutoria');
    }

        public function asesoria(){
      return $this->belongsTo('App\GrupoAsesoria');
    }

}

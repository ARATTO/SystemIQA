<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //
    protected $table = 'carreras';

    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
    ];


    public function estudiantes(){
      return $this->belongsToMany('App\Estudiante')->withTimestamps();
    }

    public function materias(){
      return $this->belongsToMany('App\Materia')->withTimestamps();
    }

}

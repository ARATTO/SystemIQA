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
<<<<<<< HEAD
=======

    public function estudiantes(){
      return $this->belongsToMany('App\Estudiante')->withTimestamps();
    }

    public function materias(){
      return $this->belongsToMany('App\Materia')->withTimestamps();
    }
>>>>>>> 306af1106b3fbd6ee19e8feb91235927940aa452
}

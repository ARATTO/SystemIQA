<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    //
    protected $table = 'ciclos';

    protected $fillable = [
        'codigo',
        'ciclo_academico',
        'anio_academico',
        'fecha_inicio',
        'fecha_fin',
    ];
<<<<<<< HEAD
=======

    public function materias(){
      return $this->belongsToMany('App\Materia')->withTimestamps();
    }
>>>>>>> 306af1106b3fbd6ee19e8feb91235927940aa452
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    //
    protected $table = 'evaluaciones';

    protected $fillable = [
        'id',
        'fecha_evaluacion',
        'nota',
        'porcentaje',
        'descripcion',
    ];
<<<<<<< HEAD
=======

    public function materia(){
      return $this->belongsTo('App\Materia');
    }

    public function notas(){
      return $this->hasMany('App\Nota');
    }
>>>>>>> 306af1106b3fbd6ee19e8feb91235927940aa452
}

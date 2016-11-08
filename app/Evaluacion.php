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
        'materia_id',
        'activa',
    ];

    /*public function materia(){
      return $this->hasMany('App\Materia');
    }*/



    public function materia(){
      return $this->belongsTo('App\Materia');
    }

    public function notas(){
      return $this->hasMany('App\Nota');
    }

}


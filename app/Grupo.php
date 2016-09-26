<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    //
    protected $table = 'grupos';

    protected $fillable = [
        'codigo',
        'horario',
        'cantidad_estudiante',
    ];
<<<<<<< HEAD
=======

    public function materia(){
      return $this->hasMany('App\Materia');
    }

    public function tipo_grupos(){
      return $this->belongsTo('App\TipoGrupo');
    }
>>>>>>> 306af1106b3fbd6ee19e8feb91235927940aa452
}

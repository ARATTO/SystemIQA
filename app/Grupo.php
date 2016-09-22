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

    public function materia(){
      return $this->hasMany('App\Materia');
    }

    public function tipo_grupos(){
      return $this->hasMany('App\TipoGrupo');
    }
}

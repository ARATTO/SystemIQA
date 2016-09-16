<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoTutoria extends Model
{
    //
    protected $table = 'grupo_tutorias';

    protected $fillable = [
        'codigo',
        'numero_grupo',
        'fecha_grupo',
    ];

    public function tutor(){
      return $this->hasMany('App\Tutor');
    }

    public function estudiante(){
      return $this->hasMany('App\Estudiante');
    }
}

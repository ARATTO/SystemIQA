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
<<<<<<< HEAD
=======

    public function tutor(){
      return $this->hasMany('App\Tutor');
    }

    public function estudiante(){
      return $this->hasMany('App\Estudiante');
    }
>>>>>>> 306af1106b3fbd6ee19e8feb91235927940aa452
}

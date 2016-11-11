<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoTutoria extends Model
{
    //
    protected $table = 'grupo_tutorias';

    protected $fillable = [
        'fecha_grupo',
        'hora',
    ];


    public function estudiante(){
      return $this->belongsTo('App\Estudiante');
    }


    public function ciclo(){
      return $this->hasOne('App\Ciclo');
    }

    public function materia(){
      return $this->belongsTo('App\Materia');

    }

    public function tutor(){
      return $this->belongsTo('App\Tutor');
    }
    
}

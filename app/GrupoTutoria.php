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


    public function tutor(){
      return $this->hasMany('App\Tutor');
    }


    public function estudiante(){
      return $this->belongsTo('App\Estudiante');
    }


    public function materia(){
      return $this->hasOne('App\Materia');
    }

    public function ciclo(){
      return $this->hasOne('App\Ciclo');
    }
    
}

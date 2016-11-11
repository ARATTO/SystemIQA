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
        'activa',
    ];

    public function materias(){
      return $this->belongsToMany('App\Materia')->withTimestamps();
    }
    
    public function materias_inscritas(){
      return $this->hasOne('App\MateriaInscrita');
    }

     public function grupo(){
      return $this->hasOne('App\Grupo');
    }

    public function grupo_tutoria(){
      return $this->belongsTo('App\GrupoTutoria');
    }
    
}
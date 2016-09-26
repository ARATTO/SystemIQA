<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    //
    protected $table = 'materias';

    protected $fillable = [
        'id',
        'codigo',
        'nombre',
        'unidades_valorativas',
        'matricula',
        'numero_retiros',
    ];

    public function evaluaciones(){
      return $this->hasMany('App\Evaluacion');
    }

    public function grupos(){
      return $this->hasMany('App\Grupo');
    }

    public function users(){
      return $this->belongsToMany('App\Materia')->withTimestamps();
    }

    public function ciclos(){
      return $this->belongsToMany('App\Ciclo')->withTimestamps();
    }

    public function carreras(){
      return $this->belongsToMany('App\Carrera')->withTimestamps();
    }

    public function materiaInscrita(){
      return $this->hasMany('App\MateriaInscrita');
    }

}

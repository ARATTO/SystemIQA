<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaInscrita extends Model
{
  //
  protected $table = 'materias_inscritas';

  protected $fillable = [
      'id',
      'cursada',
      'nota_final',
      'activa',
  ];

  public function notas(){
    return $this->hasMany('App\Nota');
  }

  public function estudiante(){
    return $this->belongsTo('App\Estudiante');
  }

  public function materia(){
    return $this->belongsTo('App\Materia');
  }
  
  public function ciclo(){
    return $this->belongsTo('App\Ciclo');
  }

  public function grupo(){
    return $this->hasOne('App\Grupo');
  }

    public function user(){
    return $this->belongsTo('App\User');
  }

}

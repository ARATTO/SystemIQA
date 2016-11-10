<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    //
    protected $table = 'grupos';
    //protected $primaryKey = 'codigo';
    //public $incrementing = false;

    protected $fillable = [
        'codigo',
        'horario',
        'cantidad_estudiante',
        'tipoGrupo_id',
        'materia_id',

    ];

    public function materia_inscrita(){
      return $this->belongsTo('App\MateriaInscrita');
    }

    public function tipo_grupo(){
      return $this->belongsTo('App\TipoGrupo','tipoGrupo_id');


    }

}

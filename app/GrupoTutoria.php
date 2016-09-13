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
      return $this->belongsTo('App\GrupoTutoria');
    }

    public function estudiante(){
      return $this->belongsTo('App\GrupoTutoria');
    }
}

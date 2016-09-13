<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    //
    protected $table = 'tutores';

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'telefono',
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function grupo_tutorias(){
      return $this->hasMany('App\GrupoTutorias');
    }
}

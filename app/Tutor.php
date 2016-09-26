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
<<<<<<< HEAD
=======

    public function user(){
      return $this->hasMany('App\User');
    }

    public function grupo_tutorias(){
      return $this->belongsTo('App\GrupoTutorias');
    }
>>>>>>> 306af1106b3fbd6ee19e8feb91235927940aa452
}

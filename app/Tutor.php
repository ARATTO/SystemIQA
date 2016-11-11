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
        'usuario_id'
    ];


    public function user(){
      return $this->hasMany('App\User');
    }

    public function grupo_tutoria(){
      return $this->hasMany('App\GrupoTutoria');
    }

}

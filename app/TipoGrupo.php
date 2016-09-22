<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoGrupo extends Model
{
    //
    protected $table = 'tipo_grupos';

    protected $fillable = [
        'id',
        'descripcion',
        'nombre',
    ];

    public function grupos(){
      return $this->hasMany('App\Grupo');
    }
}

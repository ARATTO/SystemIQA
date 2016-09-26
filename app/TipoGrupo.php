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
    ];
<<<<<<< HEAD
=======

    public function grupo(){
      return $this->hasMany('App\Grupo');
    }
>>>>>>> 306af1106b3fbd6ee19e8feb91235927940aa452
}

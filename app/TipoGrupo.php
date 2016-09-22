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

    public function grupo(){
      return $this->belongsTo('App\Grupo');
    }
}

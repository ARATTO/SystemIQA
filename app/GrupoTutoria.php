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
}

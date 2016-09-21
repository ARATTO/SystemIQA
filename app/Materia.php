<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    //
    protected $table = 'materias';

    protected $fillable = [
        'codigo',
        'nombre',
        'unidades_valorativas',
        'matricula',
        'numero_retiros',
    ];

}

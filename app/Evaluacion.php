<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    //
    protected $table = 'evaluaciones';

    protected $fillable = [
        'id',
        'fecha_evaluacion',
        'nota',
        'porcentaje',
        'descripcion',
    ];
}

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
}

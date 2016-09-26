<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    protected $table = 'rols';

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
    ];

<<<<<<< HEAD
=======
    public function users(){
      return $this->hasMany('App\User');
    }

>>>>>>> 306af1106b3fbd6ee19e8feb91235927940aa452
}

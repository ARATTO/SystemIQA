<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoAsesoria extends Model
{
    protected $table = 'grupo_asesoria';

    protected $fillable = [

    ];

     public function estudiante(){
      return $this->hasMany('App\estudiante');
    }


    public function user(){
      return $this->belongsTo('App\User');
    }
}

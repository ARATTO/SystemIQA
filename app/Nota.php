<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    //
    protected $table = 'notas';

    protected $fillable = [
        'id',
        'valor_nota',
    ];

    public function evaluacion(){
      return $this->belongsTo('App\Evaluacion');
    }

    public function materiaInscrita(){
      return $this->belongsTo('App\MateriaInscrita');
    }

}

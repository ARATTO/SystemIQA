<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'id',
        'carnet',
        'nombre',
        'apellido',
        'email',
        'telefono',
        'rol_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function rol(){
      return $this->belongsTo('App\Rol');
    }

    public function tutores(){
      return $this->belongsTo('App\Tutor');
    }

    public function materias(){
      return $this->belongsToMany('App\Materia')->withTimestamps();
    }

    public function scopeCarnet($query, $carnet){
          return $query->where('carnet', 'LIKE' , '%'.$carnet.'%');
    }

}

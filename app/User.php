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
        'foto',
        'rol_id',
        'created_at',
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
    
    public function tipoUsuario(){
        
        return $this->rol_id;
    }


    public function grupoAsesoria(){
      return $this->hasOne('App\GrupoAsesoria');
    }


    public function materias_inscritas(){
      return $this->hasMany('App\MateriaInscrita');
    }
}

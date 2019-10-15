<?php

namespace electoral;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','apellido','email','role_id','password','slug','foto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeBuscar($query,$nombre,$role)
    {
        if(trim($nombre) != NULL && $role != NULL)
        {
            return $query->where(\DB::raw('CONCAT(nombre," ",apellido)'),'LIKE','%'.$nombre.'%')->where('role_id',$role);
        }
        elseif(trim($nombre) != NULL && $role == NULL)
        {
            return $query->where(\DB::raw('CONCAT(nombre," ",apellido)'),'LIKE','%'.$nombre.'%');
        }
        elseif(trim($nombre) == NULL && $role != NULL)
        {
            return $query->where('role_id',$role);
        }
    }
}

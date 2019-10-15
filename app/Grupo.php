<?php

namespace electoral;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [
        'nombre','municipio_id','militante_id','descripcion','slug',
    ];

    public function scopeBuscar($query,$nombre,$municipio)
    {
        if(trim($nombre) != NULL && $municipio != NULL)
        {
            return $query->where('grupos.nombre','LIKE','%'.$nombre.'%')->where('municipios.id',$municipio);
        }
        elseif(trim($nombre) != NULL && $municipio == NULL)
        {
            return $query->where('grupos.nombre','LIKE','%'.$nombre.'%');
        }
        elseif(trim($nombre) == NULL && $municipio != NULL)
        {
            return $query->where('municipios.id',$municipio);
        }
    }
}

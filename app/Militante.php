<?php

namespace electoral;

use Illuminate\Database\Eloquent\Model;

class Militante extends Model
{
    protected $fillable = [
        'nombre','apellido','cedula','cedula_pdf','email','foto','telefono','celular',
        'fecha_nacimiento','sexo','formulario_fisico','comentario','facebook','instagram',
        'linkedin','twitter','user_id','militante_id','ocupacion_id',
        'grupo_id','cargo_id','sector_id','slug',
    ];

    public function scopeBuscar($query,$nombre,$sexo,$cargo,$provincia,$municipio,$sector)
    {
        //Todos los filtros
        if(trim($nombre) != NULL && $cargo != NULL && $sexo != NULL && $provincia != NULL && $municipio != NULL && $sector != NULL)
        {
            return $query->where(\DB::raw('CONCAT(militantes.nombre," ",militantes.apellido)'),'LIKE','%'.$nombre.'%')->where('militantes.cargo_id',$cargo)->where('militantes.sexo',$sexo)->where('provincias.id',$provincia)->where('municipios.id',$municipio)->where('sectors.id',$sector);
        }
        //Con 2 filtro
        elseif(trim($nombre) == NULL && $cargo != NULL && $provincia != NULL && $municipio == NULL && $sector == NULL && $sexo == NULL)
        {
            return $query->where('militantes.cargo_id',$cargo)->where('provincias.id',$provincia);
        }
        elseif(trim($nombre) == NULL && $cargo != NULL && $provincia != NULL && $municipio != NULL && $sector == NULL && $sexo == NULL)
        {
            return $query->where('militantes.cargo_id',$cargo)->where('provincias.id',$provincia)->where('municipios.id',$municipio);
        }
        elseif(trim($nombre) == NULL && $cargo != NULL && $provincia != NULL && $municipio != NULL && $sector != NULL && $sexo == NULL)
        {
            return $query->where('militantes.cargo_id',$cargo)->where('provincias.id',$provincia)->where('municipios.id',$municipio)->where('sectors.id',$sector);
        }
        elseif(trim($nombre) != NULL && $cargo == NULL && $provincia != NULL && $municipio == NULL && $sector == NULL && $sexo == NULL)
        {
            return $query->where(\DB::raw('CONCAT(militantes.nombre," ",militantes.apellido)'),'LIKE','%'.$nombre.'%')->where('provincias.id',$provincia);
        }
        elseif(trim($nombre) != NULL && $cargo == NULL && $provincia != NULL && $municipio != NULL && $sector == NULL && $sexo == NULL)
        {
            return $query->where(\DB::raw('CONCAT(militantes.nombre," ",militantes.apellido)'),'LIKE','%'.$nombre.'%')->where('provincias.id',$provincia)->where('municipios.id',$municipio);
        }
        elseif(trim($nombre) != NULL && $cargo == NULL && $provincia != NULL && $municipio != NULL && $sector != NULL && $sexo == NULL)
        {
            return $query->where(\DB::raw('CONCAT(militantes.nombre," ",militantes.apellido)'),'LIKE','%'.$nombre.'%')->where('provincias.id',$provincia)->where('municipios.id',$municipio)->where('sectors.id',$sector);
        }
        elseif(trim($nombre) != NULL && $cargo != NULL && $provincia == NULL && $municipio == NULL && $sector == NULL && $sexo == NULL)
        {
            return $query->where(\DB::raw('CONCAT(militantes.nombre," ",militantes.apellido)'),'LIKE','%'.$nombre.'%')->where('militantes.cargo_id',$cargo);
        }
        elseif(trim($nombre) != NULL && $cargo == NULL && $provincia == NULL && $municipio == NULL && $sector == NULL && $sexo != NULL)
        {
            return $query->where(\DB::raw('CONCAT(militantes.nombre," ",militantes.apellido)'),'LIKE','%'.$nombre.'%')->where('militantes.sexo',$sexo);
        }
        elseif(trim($nombre) == NULL && $cargo != NULL && $provincia == NULL && $municipio == NULL && $sector == NULL && $sexo != NULL)
        {
            return $query->where('militantes.cargo_id',$cargo)->where('militantes.sexo',$sexo);
        }
        elseif(trim($nombre) == NULL && $cargo == NULL && $provincia != NULL && $municipio == NULL && $sector == NULL && $sexo != NULL)
        {
            return $query->where('provincias.id',$provincia)->where('militantes.sexo',$sexo);
        }
        elseif(trim($nombre) == NULL && $cargo != NULL && $provincia != NULL && $municipio == NULL && $sector == NULL && $sexo != NULL)
        {
            return $query->where('militantes.cargo_id',$cargo)->where('provincias.id',$provincia)->where('militantes.sexo',$sexo);
        }
        elseif(trim($nombre) == NULL && $cargo == NULL && $provincia != NULL && $municipio != NULL && $sector == NULL && $sexo != NULL)
        {
            return $query->where('militantes.sexo',$sexo)->where('provincias.id',$provincia)->where('municipios.id',$municipio);
        }
        elseif(trim($nombre) == NULL && $cargo == NULL && $provincia != NULL && $municipio != NULL && $sector != NULL && $sexo != NULL)
        {
            return $query->where('militantes.sexo',$sexo)->where('provincias.id',$provincia)->where('municipios.id',$municipio)->where('sectors.id',$sector);
        }
        //Con 1 filtro
        elseif(trim($nombre) != NULL && $cargo == NULL && $provincia == NULL && $municipio == NULL && $sector == NULL && $sexo == NULL)
        {
            return $query->where(\DB::raw('CONCAT(militantes.nombre," ",militantes.apellido)'),'LIKE','%'.$nombre.'%');
        }
        elseif(trim($nombre) == NULL && $cargo != NULL && $provincia == NULL && $municipio == NULL && $sector == NULL && $sexo == NULL)
        {
            return $query->where('militantes.cargo_id',$cargo);
        }
        elseif(trim($nombre) == NULL && $cargo == NULL && $provincia != NULL && $municipio == NULL && $sector == NULL && $sexo == NULL)
        {
            return $query->where('provincias.id',$provincia);
        }
        elseif(trim($nombre) == NULL && $cargo == NULL && $provincia != NULL && $municipio != NULL && $sector == NULL && $sexo == NULL)
        {
            return $query->where('provincias.id',$provincia)->where('municipios.id',$municipio);
        }
        elseif(trim($nombre) == NULL && $cargo == NULL && $provincia != NULL && $municipio != NULL && $sector != NULL && $sexo == NULL)
        {
            return $query->where('sectors.id',$sector);
        }
        elseif(trim($nombre) == NULL && $cargo == NULL && $provincia == NULL && $sexo != NULL)
        {
            return $query->where('militantes.sexo',$sexo);
        }

    }
}

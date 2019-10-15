<?php

namespace electoral\Exports;

use electoral\Militante;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class MilitanteExport implements FromCollection
{
    use Exportable;

    public function __construct($sexo,$provincia,$municipio,$sector,$ocupacion,$cargo,$grupo)
    {
        $this->sexo = $sexo;
        $this->provincia = $provincia;
        $this->municipio = $municipio;
        $this->sector = $sector;
        $this->ocupacion = $ocupacion;
        $this->cargo = $cargo;
        $this->grupo = $grupo;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if($this->sexo != NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo == NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('militantes.sexo',$this->sexo)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo == NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('provincias.id',$this->provincia)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo == NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector != NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo == NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->where('sectors.id',$this->sector)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion != NULL && $this->cargo == NULL && $this->grupo == NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('ocupacions.id',$this->ocupacion)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo != NULL && $this->grupo == NULL)
        { 
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->where('cargos.id',$this->cargo)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia != NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo == NULL)
        { 
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('militantes.sexo',$this->sexo)
            ->where('provincias.id',$this->provincia)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo == NULL)
        { 
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('militantes.sexo',$this->sexo)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector != NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo == NULL)
        { 
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('militantes.sexo',$this->sexo)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->where('sectors.id',$this->sector)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion != NULL && $this->cargo == NULL && $this->grupo == NULL)
        { 
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('ocupacions.id',$this->ocupacion)
            ->where('provincias.id',$this->provincia)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector == NULL && $this->ocupacion != NULL && $this->cargo == NULL && $this->grupo == NULL)
        { 
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('ocupacions.id',$this->ocupacion)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector != NULL && $this->ocupacion != NULL && $this->cargo == NULL && $this->grupo == NULL)
        { 
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('ocupacions.id',$this->ocupacion)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->where('sectors.id',$this->sector)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo != NULL && $this->grupo == NULL)
        { 
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->where('cargos.id',$this->cargo)
            ->where('provincias.id',$this->provincia)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo != NULL && $this->grupo == NULL)
        { 
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->where('cargos.id',$this->cargo)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector != NULL && $this->ocupacion == NULL && $this->cargo != NULL && $this->grupo == NULL)
        { 
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->where('cargos.id',$this->cargo)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->where('sectors.id',$this->sector)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion != NULL && $this->cargo == NULL && $this->grupo == NULL)
        { 
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('militantes.sexo',$this->sexo)
            ->where('ocupacions.id',$this->ocupacion)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo != NULL && $this->grupo == NULL)
        { 
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('militantes.sexo',$this->sexo)
            ->where('cargos.id',$this->cargo)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion != NULL && $this->cargo != NULL && $this->grupo == NULL)
        { 
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('cargos.id',$this->cargo)
            ->where('ocupacions.id',$this->ocupacion)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector != NULL && $this->ocupacion != NULL && $this->cargo != NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('militantes.sexo',$this->sexo)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->where('sectors.id',$this->sector)
            ->where('ocupacions.id',$this->ocupacion)
            ->where('cargos.id',$this->cargo)
            ->where('grupos.id',$this->grupo)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('militantes.sexo',$this->sexo)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('provincias.id',$this->provincia)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector != NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->where('sectors.id',$this->sector)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion != NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('ocupacions.id',$this->ocupacion)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo != NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('cargos.id',$this->cargo)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia != NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('militantes.sexo',$this->sexo)
            ->where('provincias.id',$this->provincia)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('militantes.sexo',$this->sexo)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector != NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('militantes.sexo',$this->sexo)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->where('sectors.id',$this->sector)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion != NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('militantes.sexo',$this->sexo)
            ->where('ocupacions.id',$this->ocupacion)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo != NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('militantes.sexo',$this->sexo)
            ->where('cargos.id',$this->cargo)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia != NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('militantes.sexo',$this->sexo)
            ->where('provincias.id',$this->provincia)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('militantes.sexo',$this->sexo)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector != NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('militantes.sexo',$this->sexo)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->where('sectors.id',$this->sector)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion != NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('militantes.sexo',$this->sexo)
            ->where('ocupacions.id',$this->ocupacion)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo != NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('militantes.sexo',$this->sexo)
            ->where('cargos.id',$this->cargo)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion != NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('ocupacions.id',$this->ocupacion)
            ->where('provincias.id',$this->provincia)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector == NULL && $this->ocupacion != NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('ocupacions.id',$this->ocupacion)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector != NULL && $this->ocupacion != NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('ocupacions.id',$this->ocupacion)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->where('sectors.id',$this->sector)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion != NULL && $this->cargo != NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('ocupacions.id',$this->ocupacion)
            ->where('cargos.id',$this->cargo)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo != NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('cargos.id',$this->cargo)
            ->where('provincias.id',$this->provincia)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo != NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('cargos.id',$this->cargo)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector != NULL && $this->ocupacion == NULL && $this->cargo != NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('grupos.id',$this->grupo)
            ->where('cargos.id',$this->cargo)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->where('sectors.id',$this->sector)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion != NULL && $this->cargo != NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('militantes.sexo',$this->sexo)
            ->where('grupos.id',$this->grupo)
            ->where('ocupacions.id',$this->ocupacion)
            ->where('cargos.id',$this->cargo)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector != NULL && $this->ocupacion != NULL && $this->cargo == NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('militantes.sexo',$this->sexo)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->where('sectors.id',$this->sector)
            ->where('ocupacions.id',$this->ocupacion)
            ->where('grupos.id',$this->grupo)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector != NULL && $this->ocupacion == NULL && $this->cargo != NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('militantes.sexo',$this->sexo)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->where('sectors.id',$this->sector)
            ->where('cargos.id',$this->cargo)
            ->where('grupos.id',$this->grupo)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector == NULL && $this->ocupacion != NULL && $this->cargo != NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('militantes.sexo',$this->sexo)
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->where('ocupacions.id',$this->ocupacion)
            ->where('cargos.id',$this->cargo)
            ->where('grupos.id',$this->grupo)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo != NULL && $this->provincia != NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion != NULL && $this->cargo != NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('militantes.sexo',$this->sexo)
            ->where('provincias.id',$this->provincia)
            ->where('ocupacions.id',$this->ocupacion)
            ->where('cargos.id',$this->cargo)
            ->where('grupos.id',$this->grupo)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia != NULL && $this->municipio != NULL &&  $this->sector != NULL && $this->ocupacion != NULL && $this->cargo != NULL && $this->grupo != NULL)
        {
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->where('provincias.id',$this->provincia)
            ->where('municipios.id',$this->municipio)
            ->where('sectors.id',$this->sector)
            ->where('ocupacions.id',$this->ocupacion)
            ->where('cargos.id',$this->cargo)
            ->where('grupos.id',$this->grupo)
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }
        elseif($this->sexo == NULL && $this->provincia == NULL && $this->municipio == NULL &&  $this->sector == NULL && $this->ocupacion == NULL && $this->cargo == NULL && $this->grupo == NULL)
        { 
            $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
            ->join('municipios','sectors.municipio_id','municipios.id')
            ->join('provincias','municipios.provincia_id','provincias.id')
            ->join('grupos','militantes.grupo_id','grupos.id')
            ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
            ->join('cargos','militantes.cargo_id','cargos.id')
            ->join('users','militantes.user_id','users.id')
            ->select('militantes.id','militantes.nombre','militantes.apellido','militantes.cedula','militantes.sexo','militantes.email',
            'militantes.telefono','militantes.celular','militantes.fecha_nacimiento',
            'militantes.facebook','militantes.twitter','militantes.instagram',
            'militantes.linkedin','provincias.nombre AS nombreProvincia','municipios.nombre AS nombreMunicipios','sectors.nombre AS nombreSectors',
            'grupos.nombre AS nombreGrupo','ocupacions.nombre AS nombreOcupacion','cargos.nombre AS nombreCargo','militantes.comentario','militantes.created_at')->get();
        }

        return $militante;
    }
}

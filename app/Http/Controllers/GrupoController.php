<?php

namespace electoral\Http\Controllers;

use electoral\Militante;
use electoral\Grupo;
use electoral\Http\Requests\GrupoRequest;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombre');
        $municipio = $request->get('municipio');

        $grupos = Grupo::/* join('militantes','grupos.militante_id','militantes.id') */
        /* -> */join('municipios','grupos.municipio_id','municipios.id')
        ->buscar($nombre,$municipio)
        ->select('grupos.*',/* 'militantes.nombre AS nombreMilitante','militantes.apellido', */
        'municipios.nombre AS nombreMunicipio')
        ->orderBy('grupos.id','DESC')->paginate(10);

        $municipios = \DB::select('select * from municipios');

        return view('grupo.index',compact('grupos','municipios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$militantes = Militante::All();
        $municipios = \DB::select('select * from municipios');
        return view('grupo.create',compact(/* 'militantes', */'municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GrupoRequest $request)
    {
        $grupo = new Grupo();

        $grupo->nombre = $request->input('nombre');
        $grupo->municipio_id = $request->input('municipio');
        //$grupo->militante_id = $request->input('militante');
        $grupo->descripcion = $request->input('descripcion');
        $grupo->slug = $request->input('nombre').time();
        $grupo->save();

        return redirect()->action('GrupoController@show', $grupo->slug)->with('status','El grupo de trabajo fue creado exitosamente!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $grupo = Grupo::/* join('militantes','grupos.militante_id','militantes.id') */
        /* -> */join('municipios','grupos.municipio_id','municipios.id')->select('grupos.*',
        /* 'militantes.nombre AS nombreMilitante','militantes.apellido','militantes.slug AS slugMilitante', */'municipios.nombre AS nombreMunicipio')
        ->where('grupos.slug',$slug)->firstOrFail();

        $militantes = Militante::join('cargos','cargos.id','militantes.cargo_id')
        ->select('militantes.*','cargos.nombre AS nombreCargo')
        ->where('grupo_id',$grupo->id)->orderBy('id','ASC')->paginate(5);

        return view('grupo.show',compact('grupo','militantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $grupo = Grupo::where('slug',$slug)->firstOrFail();
        //$militantes = Militante::All();
        $municipios = \DB::select('select * from municipios');

        return view('grupo.edit',compact('grupo',/* 'militantes', */'municipios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GrupoRequest $request, $id)
    {
        $grupo = Grupo::find($id);

        $grupo->nombre = $request->input('nombre');
        $grupo->municipio_id = $request->input('municipio');
        //$grupo->militante_id = $request->input('militante');
        $grupo->descripcion = $request->input('descripcion');
        $grupo->save();

        return redirect()->action('GrupoController@show',$grupo->slug)->with('status','El grupo de trabajo fue actualizado exitosamente!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        $militantes = Militante::where('grupo_id',$grupo->id)->count();

        if($militantes >= 1){
            return redirect()->action('GrupoController@show',$grupo->slug)->with('status_info','El grupo de trabajo no puede ser eliminado porque posee militantes.');
        }
        else {
            $grupo->delete();
            return redirect()->action('GrupoController@index')->with('status','El grupo de trabajo fue eliminado con exito!!');
        }
        
    }
}

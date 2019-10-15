<?php

namespace electoral\Http\Controllers;

use electoral\User;
use electoral\Grupo;
use electoral\Militante;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use electoral\Exports\MilitanteExport;
use electoral\Http\Requests\MilitanteRequest;
use electoral\Http\Requests\MilitanteUpdateRequest;


class MilitanteController extends Controller
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
        $cargo = $request->get('cargo');
        $sexo = $request->get('sexo');
        $provincia = $request->get('provincia');
        $municipio = $request->get('municipio');
        $sector = $request->get('sector');

        $militantes = Militante::join('sectors','sectors.id','militantes.sector_id')
        ->join('municipios','sectors.municipio_id','municipios.id')
        ->join('provincias','municipios.provincia_id','provincias.id')
        ->join('grupos','militantes.grupo_id','grupos.id')
        ->join('cargos','militantes.cargo_id','cargos.id')
        ->buscar($nombre,$sexo,$cargo,$provincia,$municipio,$sector)
        ->select('militantes.*','provincias.nombre AS nombreProvincia','grupos.nombre AS nombreGrupo',
        'cargos.nombre AS nombreCargo')->orderBy('militantes.id','DESC')->paginate(10);

        $cargos = \DB::select('select * from cargos');
        $provincias = \DB::select('select * from provincias');

        return view('militante.index',compact('militantes','cargos','provincias'));
    }

    public function galeria(Request $request)
    {
        $nombre = $request->get('nombre');
        $cargo = $request->get('cargo');
        $sexo = $request->get('sexo');
        $provincia = $request->get('provincia');
        $municipio = $request->get('municipio');
        $sector = $request->get('sector');

        $militantes = Militante::join('sectors','sectors.id','militantes.sector_id')
        ->join('municipios','sectors.municipio_id','municipios.id')
        ->join('provincias','municipios.provincia_id','provincias.id')
        ->join('grupos','militantes.grupo_id','grupos.id')
        ->join('cargos','militantes.cargo_id','cargos.id')
        ->buscar($nombre,$sexo,$cargo,$provincia,$municipio,$sector)
        ->select('militantes.*','provincias.nombre AS nombreProvincia','grupos.nombre AS nombreGrupo',
        'cargos.nombre AS nombreCargo')->orderBy('militantes.id','DESC')->paginate(12);

        $cargos = \DB::select('select * from cargos');
        $provincias = \DB::select('select * from provincias');

        return view('militante.galeria',compact('militantes','cargos','provincias'));
    }

    public function reportes()
    {
        //User
        $user = User::count();
        $admin = User::where('role_id',1)->count();
        $empatronador = User::where('role_id',2)->count();
        //Militantes
        $militantes = Militante::count();
        $masculino = Militante::where('sexo','M')->count();
        $femenino = Militante::where('sexo','F')->count();
        //Cargos
        $regidor = Militante::where('cargo_id',1)->count();
        $alcalde = Militante::where('cargo_id',2)->count();
        $diputado = Militante::where('cargo_id',3)->count();
        $senador = Militante::where('cargo_id',4)->count();
        //Grupos
        $grupos = Grupo::count();

        return view('militante.auditoria',compact('militantes','masculino','femenino','regidor','alcalde','diputado','senador','grupos','user','admin','empatronador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = Grupo::All();
        $militantes = Militante::All();
        $provincias = \DB::select('select * from provincias');
        $ocupacions = \DB::select('select * from ocupacions');
        $cargos = \DB::select('select * from cargos');

        return view('militante.create', compact('grupos','militantes',
        'provincias','ocupacions','cargos'));
    }

    public function municipios($id)
    {
        $municipios = \DB::select('select * from municipios where provincia_id ='.$id);

        return $municipios;
    }

    public function sectores($id)
    {
        $sectores = \DB::select('select * from sectors where municipio_id = '.$id);

        return $sectores;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MilitanteRequest $request)
    {
        $militante = new Militante();

        if($request->hasFile('foto'))
        {
            $file = $request->file('foto');
            $nombre = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/perfil/',$nombre);
            $militante->foto = $nombre;
        }

        if($request->hasFile('cedula_pdf'))
        {
            $file = $request->file('cedula_pdf');
            $nombre = time().$file->getClientOriginalName();
            $file->move(public_path().'/documentos/',$nombre);
            $militante->cedula_pdf = $nombre;
        }

        if($request->hasFile('formulario_fisico'))
        {
            $file = $request->file('formulario_fisico');
            $nombre = time().$file->getClientOriginalName();
            $file->move(public_path().'/documentos/',$nombre);
            $militante->formulario_fisico = $nombre;
        }

        $militante->nombre = $request->input('nombre');
        $militante->apellido = $request->input('apellido');
        $militante->cedula = $request->input('cedula');
        $militante->fecha_nacimiento = $request->input('fecha_nacimiento');
        $militante->sexo = $request->input('sexo');
        $militante->sector_id = $request->input('sector');
        $militante->email = $request->input('email');
        $militante->telefono = $request->input('telefono');
        $militante->celular = $request->input('celular');
        $militante->ocupacion_id = $request->input('ocupacion');
        $militante->militante_id = $request->input('referido');
        $militante->grupo_id = $request->input('grupo');
        $militante->cargo_id = $request->input('cargo');
        $militante->user_id = $request->input('user');
        $militante->facebook = $request->input('facebook');
        $militante->instagram = $request->input('instagram');
        $militante->twitter = $request->input('twitter');
        $militante->linkedin = $request->input('linkedin');
        $militante->comentario = $request->input('comentario');
        $militante->slug = $request->input('nombre').time();
        $militante->save();

        return redirect()->action('MilitanteController@index')->with('status_create','El militante con el email '. $request->input('email') .' fue creado exitosamente!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $militante = Militante::join('sectors','sectors.id','militantes.sector_id')
        ->join('municipios','sectors.municipio_id','municipios.id')
        ->join('provincias','municipios.provincia_id','provincias.id')
        ->join('grupos','militantes.grupo_id','grupos.id')
        ->join('ocupacions','militantes.ocupacion_id','ocupacions.id')
        ->join('cargos','militantes.cargo_id','cargos.id')
        ->join('users','militantes.user_id','users.id')
        ->where('militantes.slug',$slug)
        ->select('militantes.*','provincias.nombre AS nombreProvincia',
        'municipios.nombre AS nombreMunicipios','grupos.nombre AS nombreGrupo',
        'sectors.nombre AS nombreSectors','cargos.nombre AS nombreCargo',
         \DB::raw('CONCAT(users.nombre," ",users.apellido) AS fullNameUser'),'ocupacions.nombre AS nombreOcupacion')->firstOrFail();

        //Referido
        $referido = Militante::find($militante->militante_id);

        //calcular edad
        $nacimiento = new \DateTime($militante->fecha_nacimiento);
        $hoy = new \DateTime();
        $restar = $hoy->diff($nacimiento);
        $edad = $restar->y;

        return view('militante.show',compact('militante','edad','referido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $grupos = Grupo::All();
        $militantes = Militante::where('slug','!=',$slug)->get();
        $cargos = \DB::select('select * from cargos');
        $provincias = \DB::select('select * from provincias');
        $municipios = \DB::select('select * from municipios');
        $sectores = \DB::select('select * from sectors');
        $ocupacions = \DB::select('select * from ocupacions');

        $militanteEdit = Militante::join('sectors','sectors.id','militantes.sector_id')
        ->join('municipios','sectors.municipio_id','municipios.id')
        ->join('provincias','municipios.provincia_id','provincias.id')
        ->select('militantes.*','provincias.id AS idProvincia',
        'municipios.id AS idMunicipios')
        ->where('militantes.slug',$slug)->firstOrFail();

        return view('militante.edit',compact('grupos','militantes',
        'provincias','municipios','sectores','ocupacions','cargos','militanteEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MilitanteUpdateRequest $request, $id)
    {
        $militante = Militante::find($id);

        if($request->hasFile('foto'))
        {
            if($militante->foto != 'perfil.png')
            {
                $foto = public_path().'/images/perfil/'.$militante->foto;
                \File::delete($foto);
            }

            $file = $request->file('foto');
            $nombre = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/perfil/',$nombre);
            $militante->foto = $nombre;
        }

        if($request->hasFile('cedula_pdf'))
        {
            $delete_cedula = public_path().'/documentos/'.$militante->cedula_pdf;
            \File::delete($delete_cedula);

            $file = $request->file('cedula_pdf');
            $nombre = time().$file->getClientOriginalName();
            $file->move(public_path().'/documentos/',$nombre);
            $militante->cedula_pdf = $nombre;
        }

        if($request->hasFile('formulario_fisico'))
        {
            $delete_formulario = public_path().'/documentos/'.$militante->formulario_fisico;
            \File::delete($delete_formulario);

            $file = $request->file('formulario_fisico');
            $nombre = time().$file->getClientOriginalName();
            $file->move(public_path().'/documentos/',$nombre);
            $militante->formulario_fisico = $nombre;
        }

        $militante->nombre = $request->input('nombre');
        $militante->apellido = $request->input('apellido');
        $militante->cedula = $request->input('cedula');
        $militante->fecha_nacimiento = $request->input('fecha_nacimiento');
        $militante->sexo = $request->input('sexo');
        $militante->sector_id = $request->input('sector');
        $militante->telefono = $request->input('telefono');
        $militante->celular = $request->input('celular');
        $militante->ocupacion_id = $request->input('ocupacion');
        $militante->militante_id = $request->input('referido');
        $militante->grupo_id = $request->input('grupo');
        $militante->cargo_id = $request->input('cargo');
        $militante->user_id = $request->input('user');
        $militante->facebook = $request->input('facebook');
        $militante->instagram = $request->input('instagram');
        $militante->twitter = $request->input('twitter');
        $militante->linkedin = $request->input('linkedin');
        $militante->comentario = $request->input('comentario');
        $militante->slug = $request->input('nombre').time();
        $militante->save();

        return redirect()->action('MilitanteController@index')->with('status_create','El militante con cedula '. $request->input('celular') .' fue actualizado exitosamente!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $militante = Militante::find($id);
        $grupo = Grupo::where('militante_id',$militante->id);
        
        if ($militante->cedula_pdf != NULL) {
            $delete_cedula = public_path().'/documentos/'.$militante->cedula_pdf;
            \File::delete($delete_cedula);
        }

        if ($militante->formulario_fisico != NULL) {
             $delete_archivo = public_path().'/documentos/'.$militante->formulario_fisico;
            \File::delete($delete_archivo);
        }

        if($militante->foto != 'perfil.png'){
            $delete_foto = public_path().'/images/perfil/'.$militante->foto;
            \File::delete($delete_foto);
        }

        $grupo->delete();
        $militante->delete();
        return redirect()->action('MilitanteController@index')->with('status','El militante fue eliminando exitosamente!!');
    }

    /*Exportar exel*/
    public function exportarExel()
    {
        $provincias = \DB::select('select * from provincias');
        $ocupacions = \DB::select('select * from ocupacions');
        $cargos = \DB::select('select * from cargos');
        $grupos = Grupo::All();

        return view('militante.exel',compact('provincias','ocupacions','cargos','grupos'));
    }

    public function export(Request $request) 
    {
        $sexo = $request->input('sexo');
        $provincia = $request->input('provincia');
        $municipio = $request->input('municipio');
        $sector = $request->input('sector');
        $ocupacion = $request->input('ocupacion');
        $cargo = $request->input('cargo');
        $grupo = $request->input('grupo');
        
        return Excel::download(new MilitanteExport($sexo,$provincia,$municipio,$sector,$ocupacion,$cargo,$grupo), 'militantes.xlsx');
    }
}

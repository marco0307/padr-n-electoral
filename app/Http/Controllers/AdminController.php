<?php

namespace electoral\Http\Controllers;
use electoral\User;
use electoral\Grupo;
use Illuminate\Http\Request;
use electoral\Militante;
use electoral\Http\Requests\UserRequest;
use electoral\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Validator;
use electoral\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('admin')->except([
            'perfil',
            'editPerfil',
            'updatePerfil',
            'editPassword',
            'updatePassword',
            'index',
            'estadisticaMilitantesProvincia',
            ]);
    }

    public function index()
    {
        $users = User::All();
        $grupos = Grupo::All();
        $militantes = Militante::All();
        $ultimos = Militante::join('cargos','militantes.cargo_id','cargos.id')
        ->select('militantes.*','cargos.nombre AS nombreCargo')
        ->orderBy('id','DESC')->limit(5)->get();
        return view('administrador.index',compact('users','militantes','grupos','ultimos'));
    }

    public function estadisticaMilitantesProvincia()
    {
        $estadisticaM = Militante::join('sectors','sectors.id','militantes.sector_id')
        ->join('municipios','sectors.municipio_id','municipios.id')
        ->join('provincias','municipios.provincia_id','provincias.id')
        ->select(\DB::raw('count(*) as cantidad'),'provincias.nombre')
        ->groupBy('provincias.nombre')->limit(5)->get();

        return $estadisticaM;
    }

    /**Perfil de usuario**/
    public function perfil()
    {
        return view('administrador.perfil');
    }

    public function editPerfil()
    {
        return view('administrador.edit_perfil');
    }

    public function updatePerfil(Request $request,$id)
    {
        $this->validate($request, [
            'nombre'=>'required|max:190',
            'apellido'=>'required|max:190',
            'foto'=>'mimes:png,jpg,jpeg',
        ]);

        $user = User::find($id);

        if($request->hasFile('foto'))
        {
            $delete_foto = public_path().'/images/perfil/'.$user->foto;
            if($user->foto != 'perfil.png'){
            \File::delete($delete_foto);
        }

            $file = $request->file('foto');
            $nombre = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/perfil/',$nombre);
            $user->foto = $nombre;
        }

        $user->nombre = $request->input('nombre');
        $user->apellido = $request->input('apellido');
        $user->save();
        
        return redirect()->action('AdminController@perfil')->with('status','Tu perfil a sido actualizado exitozamente!!');
    }

    public function editPassword()
    {
        return view('administrador.password');
    }

    public function updatePassword(PasswordRequest $request, $id)
    {
        $user = User::find($request->id);

        if(Hash::check($request->password_actual, $user->password))
        {
            $user->password = bcrypt($request->input('password'));
            $user->save();
            return redirect()->back()->with('status','La contraseña fue actualizada exitosamente!!');
        }
        else
        {
            return redirect()->back()->with('status_danger','La contraseña actual que haz ingresado no coincide con nuestros registros.');
        }
    }
    
    /********CRUD de Users********/
    public function userList(Request $request)
    {
        $nombre = $request->get('nombre');
        $role = $request->get('role_id');

        $users = User::buscar($nombre,$role)->orderBy('id','ASC')->paginate(10);
        return view('administrador.user_list',compact('users'));    
    }

    public function create()
    {
        return view('administrador.create_user');
    }

    public function store(UserRequest $request)
    {
        $user = new User();

        if($request->hasFile('foto'))
        {
            $file = $request->file('foto');
            $nombre = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/perfil/',$nombre);
            $user->foto = $nombre;
        }

        $user->nombre = $request->input('nombre');
        $user->apellido = $request->input('apellido');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');
        $user->password = bcrypt($request->input('password'));
        $user->slug = $request->input('nombre').time();
        $user->save();
        
        $email = $request->input('email');
        return redirect()->route('lista_user')->with('status_create','El usuario con correo '.$email.' a sido creado exitoxamente!');
    }

    public function show($slug)
    {
        $user = User::where('slug',$slug)->firstOrFail();
        return view('administrador.ver_user',compact('user'));
    }

    public function edit($slug)
    {
        $user = User::where('slug',$slug)->firstOrFail();
        return view('administrador.edit_user',compact('user'));
    }

    public function update(UserUpdateRequest $request, $slug)
    {
        $user = User::where('slug',$slug)->firstOrFail();

        if($request->hasFile('foto'))
        {
            $file = $request->file('foto');
            $nombre = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/perfil/',$nombre);
            $user->foto = $nombre;
        }
        
        $user->nombre = $request->input('nombre');
        $user->apellido = $request->input('apellido');
        $user->role_id = $request->input('role_id');
        $user->save();

        return redirect()->route('ver_user',$user->slug)->with('status','El usuario a sido actualizado exitosamente!!');
    }

    public function destroy($id)
    {
       $user = User::find($id);
       
       if($user->id == auth()->user()->id){
        return back()->with('status_delete','Usted mismo no puede eliminarse!!');
       }
       else{
        $delete_foto = public_path().'/images/perfil/'.$user->foto;
        if($user->foto != 'perfil.png'){
            \File::delete($delete_foto);
        }
        $user->delete();
        return back()->with('status_delete','El usuario a sido eliminado exitosamente!!');
       }
    }
}

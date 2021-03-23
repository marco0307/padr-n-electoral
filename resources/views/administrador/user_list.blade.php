@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    <h2>Listado de usuarios</h2>
    <small class="text-muted">Listado completo de usuarios administradores y empatronadores</small>
</div>
<div><a href="{{route('crear_user')}}" class="btn btn-success bg-blue-grey waves-effect"><div class="blanco">Crear usuario</div></a></div>
<div>
    @if(session('status_create'))
        <div class="alert alert-success">
            {{session('status_create')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('status_delete'))
        <div class="alert alert-danger">
            {{session('status_delete')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>      
    <div class="row clearfix">
        <div class="col-md-12 col-xs-12">
            <div class="card patients-list">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-5 col-xs-12">
                        <form action="" method="GET">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nombre" maxlength="150" class="form-control" placeholder="Nombre">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 col-xs-12">
                            <div class="form-group drop-custum">
                                <select name="role_id" class="form-control show-tick">
                                    <option value="">-- Tipo de usuario --</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Empadronador</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1 col-xs-12"><br>
                            <button type="submit" class="btn btn-success bg-blue-grey waves-effect">Buscar 
                            <svg id="i-search" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <circle cx="14" cy="14" r="12" />
                            <path d="M23 23 L30 30"  />
                        </svg></button>
                        </div>
                    </div><br>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>                                       
                                    <th>Foto de perfil</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                    <th>Tipo de usuario</th>
                                    <th>Fecha de ingreso</th>
                                    <th>Ultima Actualización</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td><span class="list-icon"><img class="patients-img" src="{{asset('images/perfil/'.$user->foto)}}" alt=""></span></td>
                                    <td><span class="list-name">{{$user->nombre}}</span></td>
                                    <td>{{$user->apellido}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>@if($user->role_id == 1)<span class="label bg-blue">Administrador</span>@else<span class="label bg-light-green">Empadronador</span>@endif</td>
                                    <td class="fechaFormato">{{$user->created_at}}</td>
                                    <td class="fechaFormatoUpdate">{{$user->updated_at}}</td>
                                    <td class="text-center">                               
                                        <form action="/user/{{$user->id}}" method="POST" style="margin: 0px;">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('ver_user',$user->slug)}}" class="btn  btn-info bg-blue-grey waves-effect">Ver</a>
                                            <a href="{{route('editar_user',$user->slug)}}" class="btn  btn-warning bg-blue-grey waves-effect" disabled>Editar</a>
                                            {{-- <button onclick="return confirm('¿Desea eliminar este usuario?')" type="submit" class="btn btn-danger bg-blue-grey waves-effect">Eliminar</button> --}}
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="centrar">
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
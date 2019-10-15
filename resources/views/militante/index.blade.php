@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    <h2>Lista de militantes</h2>
    <small class="text-muted">Listado completo de los militantes registrados.</small>
</div>
<div><a href="{{route('crear_militante')}}" class="btn btn-success bg-blue-grey waves-effect"><div class="blanco">Crear militante</div></a></div>
<div>
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
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
                    <div class="col-sm-4 col-xs-12">
                    <form action="" method="GET">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nombre" maxlength="150" class="form-control" placeholder="Nombre">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group drop-custum"><br>
                            <select name="sexo" class="form-control show-tick js-select2">
                                <option value="">-- Sexo --</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-group drop-custum"><br>
                            <select name="cargo" class="form-control show-tick js-select2">
                                <option value="">-- Cargo --</option>
                                @foreach ($cargos as $cargo)
                                <option value="{{$cargo->id}}">{{$cargo->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group drop-custum">
                            <select name="provincia" class="form-control show-tick js-select2 municipios">
                                <option value="">-- Provincia --</option>
                                @foreach ($provincias as $provincia)
                                <option value="{{$provincia->id}}">{{$provincia->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group drop-custum">
                            <select id="municipio" name="municipio" class="form-control show-tick js-select2 sectores" data-live-search="true">
                                <option value="">-- Municipio --</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group drop-custum">
                            <select id="sector" name="sector" class="form-control show-tick js-select2" data-live-search="true">
                                <option value="">-- Sector --</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1 col-xs-12">
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
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Sexo</th>
                                <th>Email</th>
                                <th>Cargo</th>
                                <th>Provincia</th>
                                <th>Grupo</th>
                                <th>Fecha de ingreso</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($militantes as $militante)
                            <tr>
                                <td><span class="list-icon"><img class="patients-img" src="{{asset('images/perfil/'.$militante->foto)}}" alt=""></span></td>
                                <td><span class="list-name">{{$militante->nombre}}</span></td>
                                <td>{{$militante->apellido}}</td>
                                <td>@if($militante->sexo == 'M') Masculino @elseif($militante->sexo == 'F') Femenino @endif</td>
                                <td>{{$militante->email}}</td>
                                <td>
                                @if($militante->cargo_id == 1)<span class="label bg-teal">{{$militante->nombreCargo}}</span>
                                @elseif($militante->cargo_id == 2)<span class="label label-danger">{{$militante->nombreCargo}}</span>
                                @elseif($militante->cargo_id == 3)<span class="label bg-indigo">{{$militante->nombreCargo}}</span>
                                @elseif($militante->cargo_id == 4)<span class="label label-primary">{{$militante->nombreCargo}}</span>@endif
                                </td>
                                <td>{{$militante->nombreProvincia}}</td>
                                <td>{{$militante->nombreGrupo}}</td>
                                <td class="fechaFormato">{{$militante->created_at}}</td>
                                <td class="text-center">
                                    <form action="/militante/{{$militante->id}}" method="POST" style="margin: 0px;">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('ver_militante',$militante->slug)}}" class="btn  btn-info bg-blue-grey waves-effect">Ver</a>
                                        <a href="{{route('editar_militante',$militante->slug)}}" class="btn  btn-warning bg-blue-grey waves-effect">Editar</a>
                                        <button onclick="return confirm('¿Desea eliminar este usuario?')" type="submit" class="btn btn-danger bg-blue-grey waves-effect">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="centrar">
                        {{$militantes->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    <h2>Listado de grupos de trabajos</h2>
    <small class="text-muted">Listado completo de lista de trabajos</small>
</div> 
<div><a href="{{route('crear_grupo')}}" class="btn  btn-success bg-blue-grey waves-effect"><div class="blanco">Crear grupo</div></a></div>
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
                    <div class="col-sm-6 col-xs-12">
                    <form action="" method="GET">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nombre" maxlength="150" class="form-control" placeholder="Nombre de grupo">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-group drop-custum"><br>
                            <select name="municipio" class="form-control show-tick js-select2">
                                <option value="">-- Municipio --</option>
                                @foreach ($municipios as $municipio)
                                <option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1 col-xs-12"><br>
                        <button type="submit" class="btn btn-success bg-blue-grey waves-effect">Buscar 
                        <svg id="i-search" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <circle cx="14" cy="14" r="12" />
                        <path d="M23 23 L30 30"  />
                    </svg></button>
                    </div></form>
                </div><br>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>                                       
                                    <th>Nombre</th>
                                    <th>Lider de grupo</th>
                                    <th>Municipio</th>
                                    <th>Descripcion</th>
                                    <th>Fecha de creacion</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grupos as $grupo)
                                <tr>
                                    <td><span class="list-name">{{$grupo->nombre}}</span></td>
                                    <td>{{$grupo->nombreMilitante}} {{$grupo->apellido}}</td>
                                    <td>{{$grupo->nombreMunicipio}}</td>
                                    <td>{{substr($grupo->descripcion,0,25)}}...</td>
                                    <td class="fechaFormato">{{$grupo->created_at}}</td>
                                    <td class="text-center">                               
                                        <form action="/grupo/{{$grupo->id}}" method="POST" style="margin: 0px;">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('ver_grupo',$grupo->slug)}}" class="btn  btn-info bg-blue-grey waves-effect">Detalles</a>
                                            <a href="{{route('editar_grupo',$grupo->slug)}}" class="btn  btn-warning bg-blue-grey waves-effect">Editar</a>
                                            @if(Auth::user()->role_id == 1)
                                            <button onclick="return confirm('¿Desea eliminar este grupo?')" type="submit" class="btn btn-danger bg-blue-grey waves-effect">Eliminar</button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="centrar">
                            {{$grupos->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
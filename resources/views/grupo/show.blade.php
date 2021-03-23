@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    <h2>Grupo de trabajo <span class="font-bold col-black">{{$grupo->nombre}}</span></h2>
    <small class="text-muted">Datos detallados del grupo de trabajo.</small>
</div>    
<div>
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('status_info'))
        <div class="alert alert-info">
            {{session('status_info')}} <b>Elimina los militantes para poder eliminar el grupo.</b>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>     
<div class="row clearfix">
    <div class="col-lg-4 col-md-12 col-sm-12">
        <div class=" card patient-profile">
            <img src="{{asset('/images/global/equipo1.jpg')}}" width="100%" class="img-fluid" alt="">                              
        </div>
        <div class="card xl-khaki">
            <div class="header xl-khaki">
                <h2>Sobre el grupo</h2>
            </div>
            <div class="body">
                <strong>Nombre del grupo</strong>
                <p>{{$grupo->nombre}}</p>
                <strong>Municipio</strong>
                <p>{{$grupo->nombreMunicipio}}</p>
                <strong>Fecha de creacion</strong>
                <p class="fechaFormato">{{$grupo->created_at}}</p>
                <hr>
                <strong>Acciones</strong>
                <form action="/grupo/{{$grupo->id}}" method="POST" style="margin: 0px;">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('crear_grupo')}}" class="btn  btn-success bg-blue-grey waves-effect">Crear grupo</a>
                    <a href="{{route('lista_grupo')}}" class="btn  btn-info bg-blue-grey waves-effect">Listar grupos</a><br>
                    <a href="{{route('editar_grupo',$grupo->slug)}}" class="btn  btn-warning bg-blue-grey waves-effect">Editar</a>
                    @if(Auth::user()->role_id == 1)
                    <button onclick="return confirm('¿Desea eliminar este grupo?')" type="submit" class="btn btn-danger bg-blue-grey waves-effect">Eliminar</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12 col-sm-12">
        <div class="card">
            <div class="body"> 
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#report">Descripcion</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#report-chart">Reporte</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane in active" id="report">
                        <div class="wrap-reset">
                            <div class="mypost-list">
                                <div class="post-box">
                                    <p>{{$grupo->descripcion}}</p>
                                </div>
                                <hr>
                                <div class="post-box">
                                    <h4>Miembros del grupo</h4>                                        
                                    <div class="body">
                                    <div class="card patients-list">
                                        <div class="table-responsive">
                                            @if($militantes->count() == 0)
                                                <div class="alert alert-info">
                                                    <strong>Informacion!</strong> Este grupo aun no tiene integrantes.
                                                </div>
                                            @else
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>                                       
                                                        <th>Foto</th>
                                                        <th>Nombre completo</th>
                                                        <th>Email</th>
                                                        <th>Cargo</th>
                                                        <th class="text-center">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($militantes as $militante)
                                                    <tr>
                                                        <td><span class="list-icon"><img class="patients-img" src="{{asset('images/perfil/'.$militante->foto)}}" alt=""></span></td>
                                                        <td><span class="list-name">{{$militante->nombre}} {{$militante->apellido}}</span></td>
                                                        <td>{{$militante->email}}</td>
                                                        <td>
                                                            @if($militante->cargo_id == 1)<span class="label bg-teal">{{$militante->nombreCargo}}</span>
                                                            @elseif($militante->cargo_id == 2)<span class="label label-danger">{{$militante->nombreCargo}}</span>
                                                            @elseif($militante->cargo_id == 3)<span class="label bg-indigo">{{$militante->nombreCargo}}</span>
                                                            @elseif($militante->cargo_id == 4)<span class="label label-primary">{{$militante->nombreCargo}}</span>@endif
                                                        </td>
                                                        <td class="text-center"><a href="{{route('ver_militante',$militante->slug)}}" class="btn  btn-info bg-blue-grey waves-effect">Ver</a></td>
                                                    </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                            <div class="centrar">
                                                {{$militantes->links()}}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="report-chart">
                        <h4>Cantidad de militantes en este grupo:</h4>
                        <div class="stats-row">
                                <div class="col-red">
                                    <h4>Hay un total de <b>{{$militantes->count()}}</b> militantes</h4></div>
                            </div>
                       <div id="real_time_chart" class="flot-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
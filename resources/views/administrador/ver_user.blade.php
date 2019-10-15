@extends('layouts.layout_user')
@section('content')
<div class="block-header">
        <h2>Perfil de <span class="font-bold col-black">{{$user->nombre}} {{$user->apellido}}</span></h2>
        <small class="text-muted">Informacion detallada del usuario</small>
</div>        
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
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body"> 
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane in active" id="report">
                            <div class="wrap-reset">
                                <div class="mypost-list">
                                    <div class="row clearfix">
                                        <div class="col-md-2 col-sm-2">
                                        <div class=" card patient-profile">
                                            <img src="{{asset('images/perfil/'.$user->foto)}}" width="200px" id="foto" class="img-fluid" alt="">                              
                                        </div></div>
                                        <div class="col-md-8 col-sm-8">
                                            <ul class="dis">
                                                <li><b>Nombre: </b>{{$user->nombre}}</li>
                                                <li><b>Apellido: </b>{{$user->apellido}}</li>
                                                <li><b>Tipo de usuario: </b>@if($user->role_id == 1)<span class="label bg-blue">Administrador</span>@else<span class="label bg-light-green">Empatronador</span>@endif</li>
                                                <li><b>Email: </b>{{$user->email}}</li>
                                                <li><b>Apellido: </b>{{$user->apellido}}</li>
                                                <li><b>Fecha de ingreso: </b><span class="fechaFormato">{{$user->created_at}}</span></li>
                                                <li><b>Ultima Actualización: </b><span class="fechaFormatoUpdate">{{$user->updated_at}}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4>Acciones</h4>
                                    <p>
                                        <a href="{{route('crear_user')}}" class="btn  btn-raised btn-success waves-effect">Crear nuevo usuario</a>
                                        <a href="{{route('lista_user')}}" class="btn  btn-raised bg-indigo waves-effect">Lista de usuarios</a>
                                        <a href="{{route('editar_user',$user->slug)}}" class="btn  btn-warning bg-blue-grey waves-effect">Editar</a>
                                        <a href="" class="btn  btn-danger bg-blue-grey waves-effect">Eliminar</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.layout_user')
@section('content')
<div class="block-header">
        <h2>Mi perfil</span></h2>
        <small class="text-muted">Informacion detallada de mi perfil</small>
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
                                            <img src="{{asset('images/perfil/'.Auth::user()->foto)}}" width="200px" id="foto" class="fotoPerfil" alt="">                              
                                        </div></div>
                                        <div class="col-md-9 col-sm-9">
                                            <ul class="dis">
                                                <li><b>Nombre: </b>{{Auth::user()->nombre}}</li>
                                                <li><b>Apellido: </b>{{Auth::user()->apellido}}</li>
                                                <li><b>Tipo de usuario: </b>@if(Auth::user()->role_id == 1)<span class="label bg-blue">Administrador</span>@else<span class="label bg-light-green">Empatronador</span>@endif</li>
                                                <li><b>Email: </b>{{Auth::user()->email}}</li>
                                                <li><b>Fecha de ingreso: </b><span class="fechaFormato">{{Auth::user()->created_at}}</span></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-1 col-sm-1">
                                            <a href="{{route('edit_perfil')}}" class="btn  btn-warning bg-blue-grey waves-effect">Editar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
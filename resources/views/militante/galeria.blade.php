@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    <h2>Galeria de militantes</h2>
    <small class="text-muted">Listado completo de los militantes registrados.</small>
</div>
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
        <button type="submit" class="btn btn-success bg-blue-grey waves-effect"><div class="blanco">Buscar  
            <svg id="i-search" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            <circle cx="14" cy="14" r="12" />
            <path d="M23 23 L30 30"  />
        </svg></div></button>
    </div>
</div><br>
<div class="row clearfix">
        @foreach ($militantes as $militante)
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="card xl-blue member-card doctor">
                <div class="body">
                    <div class="thumb-xl member-thumb">
                        <img src="{{asset('images/perfil/'.$militante->foto)}}" class="rounded-circle" alt="profile-image">                               
                    </div>
                    <div class="detail">
                        <h4 class="m-b-0">{{$militante->nombre}} {{$militante->apellido}}</h4>
                        <p class="text-muted"><b>Grupo:</b> {{$militante->nombreGrupo}}</p>
                        <ul class="social-links list-inline m-t-20">
                            @if($militante->facebook != NULL)<li><i class="zmdi zmdi-facebook"></i></li>@endif
                            @if($militante->twitter != NULL)<li><i class="zmdi zmdi-twitter"></i></li>@endif
                            @if($militante->instagram != NULL)<li><i class="zmdi zmdi-instagram"></i></li>@endif
                            @if($militante->facebook == NULL && $militante->twitter == NULL && $militante->instagram == NULL)
                            <small class="form-text text-muted">Este militeante no posee redes sociales.</small>
                            @endif
                        </ul>
                        <p class="text-muted"><span class="label bg-blue-grey">{{$militante->nombreProvincia}}</span><br>
                        @if($militante->cargo_id == 1)<span class="label bg-teal">{{$militante->nombreCargo}}</span>
                        @elseif($militante->cargo_id == 2)<span class="label label-danger">{{$militante->nombreCargo}}</span>
                        @elseif($militante->cargo_id == 3)<span class="label bg-indigo">{{$militante->nombreCargo}}</span>
                        @elseif($militante->cargo_id == 4)<span class="label label-primary">{{$militante->nombreCargo}}</span>@endif
                        <br><a href="mailto:{{$militante->email}}"><i>{{$militante->email}}</i></a></p>
                        <a href="{{route('ver_militante',$militante->slug)}}" class="btn btn-raised btn-sm">Ver perfil</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
<div class="row clearfix">
    <div class="col-sm-12 text-center">
        <a href="{{route('crear_militante')}}" class="btn btn-raised g-bg-cyan m-t-20 m-b-20">Agregar Militante</a>
    </div>
</div>
@endsection
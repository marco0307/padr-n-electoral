@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    <h2>Editar usuario <span class="font-bold col-black">{{$user->nombre}} {{$user->apellido}}</span></h2>
    <small class="text-muted">Aqui puedes actuzalizar los datos del usuario seleccionado.</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Actualizar usuario <small>En este formulario puedes actualizar los datos del usuario.</small></h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-6 col-xs-12">
                        <form action="/user/{{$user->slug}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nombre" maxlength="150" class="form-control" value="{{$user->nombre}}" placeholder="Nombre" disabled>
                                </div>
                                @if ($errors->has('nombre'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" maxlength="190" name="apellido" value="{{$user->apellido}}" class="form-control" placeholder="Apellido" disabled>
                                </div>
                                @if ($errors->has('apellido'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('apellido') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group drop-custum">
                                <select name="role_id" class="form-control show-tick" disabled>
                                    <option value="">-- Tipo de usuario --</option>
                                    <option @if($user->role_id == 2) selected @endif value="2">Empatronador</option>
                                    <option @if($user->role_id == 1) selected @endif value="1">Administrador</option>
                                </select>
                            </div>
                            @if ($errors->has('role_id'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('role_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="{{$user->email}}" disabled="disabled" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12"><br>
                           <label id="color_file">Foto de perfil</label> <input accept="image/png,image/jpeg,image/jpg" name="foto" type="file" disabled><br>
                           @if ($errors->has('foto'))
                           <span class="invalid-feedback text-danger" role="alert">
                               <strong>{{ $errors->first('foto') }}</strong>
                           </span>
                           @endif
                           <hr>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-raised g-bg-cyan" disabled>Actualizar</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
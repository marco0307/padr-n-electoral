@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    <h2>Crear nuevo usuario</h2>
    <small class="text-muted">Registra un nuevo usuario como administrador o empatronador.</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Formulario de usuario <small>Por favor completar el formulario con los campos requeridos.</small></h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-6 col-xs-12">
                        <form action="/user" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nombre" maxlength="150" class="form-control" value="{{ old('nombre') }}" placeholder="Nombre" disabled>
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
                                    <input type="text" maxlength="190" name="apellido" value="{{ old('apellido') }}" class="form-control" placeholder="Apellido" disabled>
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
                                    <option @if(old('role_id') == 2) selected @endif value="2">Empadronador</option>
                                    <option @if(old('role_id') == 1) selected @endif value="1">Administrador</option>
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
                                    <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email" disabled>
                                </div>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña" disabled>
                                </div>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="password_confirm" class="form-control" placeholder="Repetir contraseña" disabled>
                                </div>
                                @if ($errors->has('password_confirm'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('password_confirm') }}</strong>
                                </span>
                                @endif
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
                            <button type="reset" class="btn btn-raised" disabled>Limpiar</button>
                            <button type="submit" class="btn btn-raised g-bg-cyan" disabled>Enviar</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
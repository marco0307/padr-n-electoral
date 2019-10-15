@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    <h2>Actualizar contraseña</h2>
    <small class="text-muted">Actualiza tu contraseña para mantener tu cuenta segura.</small>
    </div>
    <div>
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif(session('status_danger'))
        <div class="alert alert-danger">
            {{session('status_danger')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Formulario de cambio de contraseña <small>Por favor completar el formulario con los campos requeridos.</small></h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12 col-xs-12">
                        <form action="{{route('update_password',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="password_actual" maxlength="150" class="form-control" value="{{ old('password_actual') }}" placeholder="Nueva actual">
                                </div>
                                @if ($errors->has('password_actual'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('password_actual') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="password" maxlength="150" class="form-control" value="{{ old('password') }}" placeholder="Nueva contraseña">
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
                                    <input type="password" name="password_confirmation" maxlength="150" class="form-control" value="{{ old('password_confirmation') }}" placeholder="Repetir contraseña">
                                </div>
                                @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-raised g-bg-cyan">Actualizar contraseña</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
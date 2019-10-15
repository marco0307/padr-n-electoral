@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    <h2>Editar perfil</h2>
    <small class="text-muted">Aqui puedes actualizar tus datos.</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Actualizar usuario <small>En este formulario puedes actualizar tus datos de usuario.</small></h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-6 col-xs-12">
                        <form action="{{route('updatePerfil',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nombre" maxlength="150" class="form-control" value="{{Auth::user()->nombre}}" placeholder="Nombre">
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
                                    <input type="text" maxlength="190" name="apellido" value="{{Auth::user()->apellido}}" class="form-control" placeholder="Apellido">
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
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="{{Auth::user()->email}}" disabled="disabled" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12"><br>
                           <label id="color_file">Foto de perfil</label> <input accept="image/png,image/jpeg,image/jpg" name="foto" type="file"><br>
                           @if ($errors->has('foto'))
                           <span class="invalid-feedback text-danger" role="alert">
                               <strong>{{ $errors->first('foto') }}</strong>
                           </span>
                           @endif
                           <hr>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-raised g-bg-cyan">Actualizar</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
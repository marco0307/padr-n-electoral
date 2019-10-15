@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    <h2>Editar grupo de trabajo <span class="font-bold col-black">{{$grupo->nombre}}</span></h2>
    <small class="text-muted">Aqui puedes actuzalizar los datos del grupo de trabajo.</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Formulario de grupo de trabajo <small>Por favor completar el formulario con los campos requeridos.</small></h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-6 col-xs-12">
                        <form action="/grupo/{{$grupo->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nombre" maxlength="150" class="form-control" value="{{$grupo->nombre}}" placeholder="Nombre de grupo">
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
                                    <select name="municipio" class="form-control show-tick">
                                        <option value="">-- Municipio --</option>
                                        @foreach ($municipios as $municipio)
                                        <option @if($grupo->municipio_id == $municipio->id) selected @endif value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('municipio'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('municipio') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="militante" class="form-control show-tick">
                                        <option value="">-- Lider del grupo --</option>
                                        @foreach ($militantes as $militante)
                                            <option @if($grupo->militante_id == $militante->id) selected @endif value="{{$militante->id}}">{{$militante->nombre}} {{$militante->apellido}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('militante'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('militante') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea maxlength="1195" name="descripcion" class="form-control" placeholder="Descripcion del grupo">{{$grupo->descripcion}}</textarea>
                                </div>
                                @if ($errors->has('descripcion'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-raised g-bg-cyan">Actuzalizar</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
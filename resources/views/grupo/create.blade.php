@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    <h2>Crear nuevo grupo de trabajo</h2>
    <small class="text-muted">Registra un nuevo usuario como administrador o empatronador.</small>
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
                        <form action="/grupo" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nombre" maxlength="150" class="form-control" value="{{ old('nombre') }}" placeholder="Nombre de grupo">
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
                                    <select name="municipio" class="form-control show-tick js-select2" data-live-search="true">
                                        <option value="">-- Municipio --</option>
                                        @foreach ($municipios as $municipio)
                                        <option @if(old('municipio') == $municipio->id) selected @endif value="{{$municipio->id}}">{{$municipio->nombre}}</option>
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
                                    <select name="militante" class="form-control show-tick js-select2" data-live-search="true">
                                        <option value="">-- Lider del grupo --</option>
                                        @foreach ($militantes as $militante)
                                            <option @if(old('militante') == $militante->id) selected @endif value="{{$militante->id}}">{{$militante->nombre}} {{$militante->apellido}}</option>
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
                                    <textarea maxlength="1290" name="descripcion" class="form-control" placeholder="Descripcion del grupo">{{ old('descripcion') }}</textarea>
                                </div>
                                @if ($errors->has('descripcion'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="reset" class="btn btn-raised">Limpiar</button>
                            <button type="submit" class="btn btn-raised g-bg-cyan">Crear</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
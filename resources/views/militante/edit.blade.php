@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    <h2>Editar militante <span class="font-bold col-black">{{$militanteEdit->nombre}} {{$militanteEdit->apellido}}</span></h2>
    <small class="text-muted">Aqui puedes actuzalizar los datos del militante seleccionado.</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Actualizar militante <small>En Este Formulario Puedes Actualizar Los Datos Del militante.</small></h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-6 col-xs-12">
                        <form action="/militante/{{$militanteEdit->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{Auth::user()->id}}" name="user">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nombre" maxlength="150" class="form-control" value="{{$militanteEdit->nombre}}" placeholder="Nombre">
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
                                    <input type="text" maxlength="190" name="apellido" value="{{$militanteEdit->apellido}}" class="form-control" placeholder="Apellido">
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
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="cedula" onkeypress="return justNumbers(event)" maxlength="11" value="{{$militanteEdit->cedula}}" class="form-control" placeholder="cedula">
                            </div>
                            @if ($errors->has('cedula'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('cedula') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" maxlength="190" name="fecha_nacimiento" value="{{$militanteEdit->fecha_nacimiento}}" class="form-control" placeholder="Fecha nacimiento">
                            </div>
                            @if ($errors->has('fecha_nacimiento'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-group drop-custum">
                            <select name="sexo" class="form-control show-tick">
                                <option value="">-- Sexo --</option>
                                <option @if($militanteEdit->sexo == 'M') selected @endif value="M">Masculino</option>
                                <option @if($militanteEdit->sexo == 'F') selected @endif value="F">Femenino</option>
                            </select>
                        </div>
                        @if ($errors->has('sexo'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('sexo') }}</strong>
                            </span>
                        @endif
                    </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-4 col-xs-12">
                        <div class="form-group drop-custum">
                            <select onchange="" name="provincia" class="form-control show-tick js-select2 municipios" data-live-search="true">
                                <option value="">-- Provincia --</option>
                                @foreach ($provincias as $provincia)
                                <option @if($militanteEdit->idProvincia == $provincia->id) selected @endif value="{{$provincia->id}}">{{$provincia->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('provincia'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('provincia') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="col-sm-4 col-xs-12">
                        <div class="form-group drop-custum">
                            <select id="municipio" name="municipio" class="form-control show-tick js-select2 sectores" data-live-search="true">
                                <option value="">-- Municipio --</option>
                                @foreach ($municipios as $municipio)
                                <option @if($militanteEdit->idMunicipios == $municipio->id) selected @endif value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('municipio'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('municipio') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="col-sm-4 col-xs-12">
                        <div class="form-group drop-custum">
                            <select name="sector" class="form-control show-tick js-select2" data-live-search="true">
                                <option value="">-- Sector --</option>
                                @foreach ($sectores as $sector)
                                <option @if($militanteEdit->sector_id == $sector->id) selected @endif value="{{$sector->id}}">{{$sector->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('sector'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('sector') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" disabled="disabled" name="email" value="{{$militanteEdit->email}}" class="form-control" placeholder="Email">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="telefono" onkeypress="return justNumbers(event)" maxlength="10" maxlength="150" class="form-control" value="{{$militanteEdit->telefono}}" placeholder="Telefono">
                                </div>
                                @if ($errors->has('telefono'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" onkeypress="return justNumbers(event)" maxlength="10" name="celular" value="{{$militanteEdit->celular}}" class="form-control" placeholder="Celular">
                                </div>
                                @if ($errors->has('celular'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('celular') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                        <div class="form-group drop-custum"><br>
                            <select name="ocupacion" class="form-control show-tick js-select2" data-live-search="true">
                                <option value="">-- Ocupacion --</option>
                                @foreach ($ocupacions as $ocupacion)
                                <option @if($militanteEdit->ocupacion_id == $ocupacion->id) selected @endif value="{{$ocupacion->id}}">{{$ocupacion->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('ocupacion'))
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $errors->first('ocupacion') }}</strong>
                        </span>
                        @endif
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-4 col-xs-12">
                        <div class="form-group drop-custum">
                            <select name="referido" class="form-control show-tick js-select2" data-live-search="true">
                                <option value="">-- Referido por --</option>
                                @foreach ($militantes as $militante)
                                <option @if($militanteEdit->militante_id == $militante->id) selected @endif value="{{$militante->id}}">{{$militante->nombre}} {{$militante->apellido}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('referido'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('referido') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="col-sm-4 col-xs-12">
                        <div class="form-group drop-custum">
                            <select name="grupo" class="form-control show-tick js-select2" data-live-search="true">
                                <option value="">-- Grupo --</option>
                                @foreach ($grupos as $grupo)
                                <option @if($militanteEdit->grupo_id == $grupo->id) selected @endif value="{{$grupo->id}}">{{$grupo->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('grupo'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('grupo') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="col-sm-4 col-xs-12">
                        <div class="form-group drop-custum">
                            <select name="cargo" class="form-control show-tick js-select2" data-live-search="true">
                                <option value="">-- Cargo --</option>
                                @foreach ($cargos as $cargo)
                                <option @if($militanteEdit->cargo_id == $cargo->id) selected @endif value="{{$cargo->id}}">{{$cargo->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('cargo'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('cargo') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="facebook" value="{{old('facebook')}}" class="form-control" placeholder="Facebook">
                                </div>
                                @if ($errors->has('facebook'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('facebook') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="instagram" value="{{$militanteEdit->instagram}}" class="form-control" placeholder="Instagram">
                                </div>
                                @if ($errors->has('instagram'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('instagram') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="twitter" value="{{$militanteEdit->twitter}}" class="form-control" placeholder="Twitter">
                                </div>
                                @if ($errors->has('twitter'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('twitter') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="linkedin" value="{{$militanteEdit->linkedin}}" class="form-control" placeholder="Linkedin">
                                </div>
                                @if ($errors->has('linkedin'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('linkedin') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-4 col-xs-12">
                           <label id="color_file">Foto de perfil</label> <input accept="image/png,image/jpeg,image/jpg" name="foto" type="file"><br>
                           @if ($errors->has('foto'))
                           <span class="invalid-feedback text-danger" role="alert">
                               <strong>{{ $errors->first('foto') }}</strong>
                           </span>
                           @endif
                        </div>
                        <div class="col-sm-4 col-xs-12">
                           <label id="color_file">Cedula en PDF</label> <input accept="application/pdf" name="cedula_pdf" type="file"><br>
                           @if ($errors->has('cedula_pdf'))
                           <span class="invalid-feedback text-danger" role="alert">
                               <strong>{{ $errors->first('cedula_pdf') }}</strong>
                           </span>
                           @endif
                        </div>
                        <div class="col-sm-4 col-xs-12">
                           <label id="color_file">Formulario fisico PDF</label> <input accept="application/pdf" name="formulario_fisico" type="file"><br>
                           @if ($errors->has('formulario_fisico'))
                           <span class="invalid-feedback text-danger" role="alert">
                               <strong>{{ $errors->first('formulario_fisico') }}</strong>
                           </span>
                           @endif
                        </div>
                    </div>
                    <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <textarea maxlength="1100" name="comentario" class="form-control" placeholder="Comentario">{{$militanteEdit->comentario}}</textarea>
                            </div>
                            @if ($errors->has('comentario'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('comentario') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    </div>
                    <div class="row clearfix">
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
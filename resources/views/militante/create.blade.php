@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    <h2>Crear nuevo militante</h2>
    <small class="text-muted">Registra un nuevo militante.</small>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Formulario de militante <small>Por favor completar el formulario con los campos requeridos.</small></h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-6 col-xs-12">
                        <form action="/militante" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{Auth::user()->id}}" name="user">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nombre" maxlength="150" class="form-control" value="{{ old('nombre') }}" placeholder="Nombre">
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
                                    <input type="text" maxlength="190" name="apellido" value="{{ old('apellido') }}" class="form-control" placeholder="Apellido">
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
                                <input type="text" name="cedula" onkeypress="return justNumbers(event)" maxlength="11" value="{{ old('cedula') }}" class="form-control" placeholder="cedula">
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
                                <input type="date" maxlength="190" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" class="form-control" placeholder="Fecha nacimiento">
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
                                <option @if(old('sexo') == 'M') selected @endif value="M">Masculino</option>
                                <option @if(old('sexo') == 'F') selected @endif value="F">Femenino</option>
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
                            <select id="provincia" name="provincia" class="form-control show-tick js-select2 municipios" data-live-search="true">
                                <option value="">-- Provincia --</option>
                                @foreach ($provincias as $provincia)
                                <option @if(old('provincia') == $provincia->id) selected @endif value="{{$provincia->id}}">{{$provincia->nombre}}</option>
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
                            </select>
                        </div>
                        <input type="hidden" id="id_municipio" value="{{old('municipio')}}" />
                        @if ($errors->has('municipio'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('municipio') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="col-sm-4 col-xs-12">
                        <div class="form-group drop-custum">
                            <select id="sector" name="sector" class="form-control show-tick js-select2" data-live-search="true">
                                <option value="">-- Sector --</option>
                            </select>
                        </div>
                        <input type="hidden" id="id_sector" value="{{old('sector')}}" />
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
                                    <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                                </div>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="telefono" onkeypress="return justNumbers(event)" maxlength="10" maxlength="150" class="form-control" value="{{ old('telefono') }}" placeholder="Telefono">
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
                                    <input type="text" onkeypress="return justNumbers(event)" maxlength="10" name="celular" value="{{ old('celular') }}" class="form-control" placeholder="Celular">
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
                                <option @if(old('ocupacion') == $ocupacion->id) selected @endif value="{{$ocupacion->id}}">{{$ocupacion->nombre}}</option>
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
                                <option @if(old('referido') == $militante->id) selected @endif value="{{$militante->id}}">{{$militante->nombre}} {{$militante->apellido}}</option>
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
                                <option @if(old('grupo') == $grupo->id) selected @endif value="{{$grupo->id}}">{{$grupo->nombre}}</option>
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
                                <option @if(old('cargo') == $cargo->id) selected @endif value="{{$cargo->id}}">{{$cargo->nombre}}</option>
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
                                    <input type="text" name="instagram" value="{{old('instagram')}}" class="form-control" placeholder="Instagram">
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
                                    <input type="text" name="twitter" value="{{old('twitter')}}" class="form-control" placeholder="Twitter">
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
                                    <input type="text" name="linkedin" value="{{old('linkedin')}}" class="form-control" placeholder="Linkedin">
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
                           <hr>
                        </div>
                    </div>
                    <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <textarea maxlength="1100" name="comentario" class="form-control" placeholder="Comentario">{{ old('comentario') }}</textarea>
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
                            <button type="reset" class="btn btn-raised">Limpiar</button>
                            <button type="submit" class="btn btn-raised g-bg-cyan">Agregar</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
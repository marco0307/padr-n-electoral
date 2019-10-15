@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    <h2>Exportar lista de militantes a EXEL</h2>
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
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Formulario de reportes <small>Por favor seleccione los filtros para el reporte.</small></h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                <div class="col-sm-12 col-xs-12">
                    <form action="{{route('export')}}" id="exel-form" method="POST">
                        @csrf
                    <div class="form-group drop-custum">
                        <select name="sexo" class="form-control show-tick js-select2" data-live-search="true">
                            <option value="">-- Sexo --</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-4 col-xs-12">
                    <div class="form-group drop-custum">
                        <select id="provincia" name="provincia" class="form-control show-tick js-select2 municipios" data-live-search="true">
                            <option value="">-- Provincia --</option>
                            @foreach ($provincias as $provincia)
                            <option value="{{$provincia->id}}">{{$provincia->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                    <div class="form-group drop-custum">
                        <select id="municipio" name="municipio" class="form-control show-tick js-select2 sectores" data-live-search="true">
                            <option value="">-- Municipio --</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                    <div class="form-group drop-custum">
                        <select id="sector" name="sector" class="form-control show-tick js-select2" data-live-search="true">
                            <option value="">-- Sector --</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-6 col-xs-12">
                    <div class="form-group drop-custum"><br>
                        <select name="ocupacion" class="form-control show-tick js-select2" data-live-search="true">
                            <option value="">-- Ocupacion --</option>
                            @foreach ($ocupacions as $ocupacion)
                            <option value="{{$ocupacion->id}}">{{$ocupacion->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group drop-custum"><br>
                            <select name="cargo" class="form-control show-tick js-select2" data-live-search="true">
                                <option value="">-- Cargo --</option>
                                @foreach ($cargos as $cargo)
                                <option value="{{$cargo->id}}">{{$cargo->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                    
                </div>
                <div class="row clearfix">
                <div class="col-sm-12 col-xs-12">
                    <div class="form-group drop-custum">
                        <select name="grupo" class="form-control show-tick js-select2" data-live-search="true">
                            <option value="">-- Grupo --</option>
                            @foreach ($grupos as $grupo)
                            <option value="{{$grupo->id}}">{{$grupo->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div>
    <a href="" onclick="event.preventDefault(); document.getElementById('exel-form').submit();" class="btn btn-raised btn-success btn-block btn-lg waves-effect">Exportar a exel <svg id="i-download" 
        viewBox="0 0 32 32" width="17" height="17" fill="none" stroke="currentcolor" stroke-linecap="round"
         stroke-linejoin="round" stroke-width="2"><path d="M9 22 C0 23 1 12 9 13 6 2 23 2 22 10 32 7 32 23 23 22 M11 26 L16 30 21 26 M16 16 L16 30" />
    </svg></a>
    <br><br>
</div>
<div class="row clearfix">
    <div class="col-sm-12 text-center">
        <a href="{{route('lista_militante')}}" class="btn btn-raised g-bg-cyan m-t-20 m-b-20">Lista de militantes</a>
    </div>
</div>
@endsection
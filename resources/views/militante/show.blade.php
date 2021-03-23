@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    <h2>Perfil de militante <span class="font-bold col-black">{{$militante->nombre}} {{$militante->apellido}}</span></h2>
    <small class="text-muted">Datos detallados del militante.</small>
</div>        
<div class="row clearfix">
    <div class="col-lg-3 col-md-12 col-sm-12">
        <div class=" card patient-profile">
            <img src="{{asset('images/perfil/'.$militante->foto)}}" width="100%" alt="Perfil img">                              
        </div>
        <div class="card xl-turquoise">
            <div class="header xl-turquoise">
                <h2>Acerca del militante</h2>
            </div>
            <div class="body">
                <strong>Nombre</strong>
                <p>{{$militante->nombre}} {{$militante->apellido}}</p>
                <strong>Grupo</strong>
                <p>{{$militante->nombreGrupo}}</p>
                <strong>Fecha de ingreso</strong>
                <p class="fechaFormato">{{$militante->created_at}}</p>
                <hr>
                <strong>Acciones</strong>
                <form action="/militante/{{$militante->id}}" method="POST" style="margin: 0px;">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('crear_militante')}}" class="btn  btn-success bg-blue-grey waves-effect">Nuevo</a>
                    <a href="{{route('editar_militante',$militante->slug)}}" class="btn  btn-warning bg-blue-grey waves-effect">Editar</a>
                    @if(Auth::user()->role_id == 1)
                    <button onclick="return confirm('¿Desea eliminar este grupo?')" type="submit" class="btn btn-danger bg-blue-grey waves-effect">Eliminar</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12 col-sm-12">
        <div class="card">
            <div class="body"> 
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#report">Datos generales</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#timeline">Documentos Fisicos</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#report-chart">Redes sociales</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane in active" id="report">
                        <div class="wrap-reset">
                            <div class="mypost-list">
                                <div class="post-box">
                                <p>
                                    @if($militante->comentario != NULL)
                                    {{$militante->comentario}}
                                    @else
                                    <div class="alert alert-info">
                                        <strong><svg id="i-info" viewBox="0 0 32 32" width="15" height="15" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                        <path d="M16 14 L16 23 M16 8 L16 10" /><circle cx="16" cy="16" r="14" />
                                        </svg> Información!</strong> Este militante no posee ningun comentario.
                                    </div>
                                    @endif
                                </p>
                                </div>
                                <hr>
                                <h4>Datos generales</h4>
                                <ul class="dis">
                                    <li><b>Nombre: </b>{{$militante->nombre}}</li>
                                    <li><b>Apellido: </b>{{$militante->apellido}}</li>
                                    <li><b>Sexo: </b>@if($militante->sexo == 'M') Masculino @elseif($militante->sexo == 'F') Femenino @endif</li>
                                    <li><b>Fecha nacimiento: </b><span class="fechaFormato">{{$militante->fecha_nacimiento}}</span></li>
                                    <li><b>Edad: </b>{{$edad}}</li>
                                    <li><b>Cedula: </b>{{$militante->cedula}}</li>
                                    <li><b>Ocupación: </b>{{$militante->nombreOcupacion}}</li>
                                </ul>
                                <hr>
                                <h4>Datos de militante</h4>
                                <ul class="dis">
                                    <li><b>Grupo: </b>@if($militante->grupo_id != NULL){{$militante->nombreGrupo}}@else <i>Indefinido</i> @endif</li>
                                    <li><b>Cargo: </b>
                                        @if($militante->cargo_id == 1)<span class="label bg-teal">{{$militante->nombreCargo}}</span>
                                        @elseif($militante->cargo_id == 2)<span class="label label-danger">{{$militante->nombreCargo}}</span>
                                        @elseif($militante->cargo_id == 3)<span class="label bg-indigo">{{$militante->nombreCargo}}</span>
                                        @elseif($militante->cargo_id == 4)<span class="label label-primary">{{$militante->nombreCargo}}</span>@endif</li>
                                    <li><b>Referido por: </b>@if($referido){{$referido->nombre}} {{$referido->apellido}}@else <i>Indefinido</i> @endif</li>
                                    <li><b>Creado por: </b>{{$militante->fullNameUser}}</li>
                                </ul>
                                <hr>
                                <h4>Contacto</h4>
                                <ul class="dis">
                                    <li><b>Email: </b>{{$militante->email}}</li>
                                    <li><b>Telefono: </b>@if($militante->telefono == NULL)<span class="font-italic col-pink">Indefinido</span>@endif{{$militante->telefono}}</li>
                                    <li><b>Celular: </b>{{$militante->celular}}</li>
                                </ul>
                                <hr>
                                <h4>Dirección en Rep. Dom.</h4>
                                <ul class="dis">
                                    <li><b>Provincia: </b>{{$militante->nombreProvincia}}</li>
                                    <li><b>Municipio: </b>{{$militante->nombreMunicipios}}</li>
                                    <li><b>Sector: </b>{{$militante->nombreSectors}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="timeline">
                        <div class="timeline-body">
                            <div class="timeline m-border">
                                <div class="timeline-item">
                                    <div class="item-content">
                                        <div class="text-small"><b>Cedula en formato PDF</b></div>
                                        <p>
                                            @if($militante->cedula_pdf == NULL)
                                            <div class="alert alert-danger">
                                                    <strong><svg id="i-info" viewBox="0 0 32 32" width="15" height="15" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path d="M16 14 L16 23 M16 8 L16 10" /><circle cx="16" cy="16" r="14" />
                                                    </svg> Información!</strong> Este militante aun no ha hablilitado la cedula en formato PDF.
                                                </div>
                                            @else
                                                <a href="{{asset('/documentos/'.$militante->cedula_pdf)}}" target="black" class="btn btn-raised btn-primary waves-effect">Ver</a>
                                                <a href="{{asset('/documentos/'.$militante->cedula_pdf)}}" download="Cedula en PDF {{$militante->cedula}}" class="btn btn-raised btn-success waves-effect">Descargar</a>
                                            @endif
                                            
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-item border-info">
                                    <div class="item-content">
                                        <div class="text-small"><b>Formulario Fisico</b></div>
                                        <p>
                                            @if($militante->formulario_fisico == NULL)
                                            <div class="alert alert-danger">
                                                    <strong><svg id="i-info" viewBox="0 0 32 32" width="15" height="15" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path d="M16 14 L16 23 M16 8 L16 10" /><circle cx="16" cy="16" r="14" />
                                                    </svg> Información!</strong> Este militante  aun no ha hablilitado el formulario fisico.
                                                </div>
                                            @else
                                                <a href="{{asset('/documentos/'.$militante->formulario_fisico)}}" target="black" class="btn btn-raised btn-primary waves-effect">Ver</a>
                                                <a href="{{asset('/documentos/'.$militante->formulario_fisico)}}" download="Formulario fisico {{$militante->cedula}}" class="btn btn-raised btn-success waves-effect">Descargar</a>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="report-chart">
                        <div class="stats-row">
                                <div class="stat-item col-blue">
                                    <h4>Facebook: <b>@if($militante->facebook == NULL) <span class="font-italic col-pink">Indefinido</span> @else <span class="text-warning">{{$militante->facebook}}</span> @endif</b></h4></div>
                                <div class="stat-item col-blush">
                                    <h6>Instagram: <b>@if($militante->instagram == NULL) <span class="font-italic col-pink">Indefinido</span> @else <span class="text-warning">{{$militante->instagram}}</span> @endif</b></h6></div>
                                <div class="stat-item text-info">
                                    <h6>Twitter: <b>@if($militante->twitter == NULL) <span class="font-italic col-pink">Indefinido</span> @else <span class="text-warning">{{$militante->twitter}}</span> @endif</b></h6></div>
                                <div class="stat-item text-secondary">
                                    <h6>Linkedin: <b>@if($militante->linkedin == NULL) <span class="font-italic col-pink">Indefinido</span> @else <span class="text-warning">{{$militante->linkedin}}</span> @endif</b></h6></div>
                            </div>
                       <div id="real_time_chart" class="flot-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
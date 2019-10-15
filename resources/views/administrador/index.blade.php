@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    @if(Auth::user()->role_id == 1)
    <h2>Administrador</h2>
    <ol class="breadcrumb">
        <li>Usuario administrador</li>
    </ol>
    @elseif(Auth::user()->role_id == 2)
    <h2>Empadronador</h2>
    <ol class="breadcrumb">
        <li>Usuario empadronador</li>
    </ol>
    @endif
</div>
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">					
            <div class="body">
                <div class="row clearfix">
                    @if(Auth::user()->role_id == 1)
                    <div class="col-md-4 col-sm-12 col-xs-12 text-center">
                        <div class="body">
                            <h2 class="number count-to m-t-0" data-from="0" data-to="501" data-speed="1000" data-fresh-interval="700">{{$users->count()}}</h2>
                            <small class="text-muted">Usuarios</small>
                            <span id="linecustom1">7,8,9,6,5,3,5,8,5,7</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 text-center">
                        <div class="body">
                            <h2 class="number count-to m-t-0" data-from="0" data-to="2501" data-speed="2000" data-fresh-interval="700">{{$militantes->count()}}</h2>
                            <small class="text-muted ">Militantes</small>
                            <span id="linecustom2">6,9,8,5,8,5,7,5,9</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 text-center">
                        <div class="body">
                            <h2 class="number count-to m-t-0" data-from="0" data-to="6051" data-speed="2000" data-fresh-interval="700">{{$grupos->count()}}</h2>
                            <small class="text-muted">Grupos de trabajo</small>
                            <span id="linecustom3">7,9,7,6,6,3,6,8,4,7</span>
                        </div>
                    </div>
                    @elseif(Auth::user()->role_id == 2)
                    <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                        <div class="body">
                            <h2 class="number count-to m-t-0" data-from="0" data-to="2501" data-speed="2000" data-fresh-interval="700">{{$militantes->count()}}</h2>
                            <small class="text-muted ">Militantes</small>
                            <span id="linecustom2">6,9,8,5,8,5,7,5,9</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 text-center">
                        <div class="body">
                            <h2 class="number count-to m-t-0" data-from="0" data-to="6051" data-speed="2000" data-fresh-interval="700">{{$grupos->count()}}</h2>
                            <small class="text-muted">Grupos de trabajo</small>
                            <span id="linecustom3">7,9,7,6,6,3,6,8,4,7</span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">				
        <div class="card product-report">
            <div class="header">
                <h2>5 provincias con mas militantes</h2>
            </div>
        <div class="body">
            <div id="militantesProvinciasGraficoPie" >
            
            </div>
        </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="card activities">
            <div class="header">
                <h2>Ultimos agregados</h2>
                <small>Militantes</small>
            </div>
            <div class="body">
                <div class="streamline b-l b-accent">
                    @foreach ($ultimos as $ultimo)
                        <div class="sl-item">
                        <div class="sl-content">
                            <div class="text-muted-dk"><a id="ultimo" title="Ver perfil" href="{{route('ver_militante',$ultimo->slug)}}">{{$ultimo->nombre}} {{$ultimo->apellido}}</a></div>
                            <p>
                                @if($ultimo->cargo_id == 1)<span class="label bg-teal">{{$ultimo->nombreCargo}}</span>
                                @elseif($ultimo->cargo_id == 2)<span class="label label-danger">{{$ultimo->nombreCargo}}</span>
                                @elseif($ultimo->cargo_id == 3)<span class="label bg-indigo">{{$ultimo->nombreCargo}}</span>
                                @elseif($ultimo->cargo_id == 4)<span class="label label-primary">{{$ultimo->nombreCargo}}</span>@endif
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="card">
            <div class="body" id="footer">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <h5>Boletines electrónicos</h5>
                        <p>Regístrese para recibir nuevos contenidos, actualizaciones y ofertas de MaterialWrap.</p>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" class="form-control date" placeholder="Enter your email...">
                            </div>
                            <span class="input-group-addon"> <i class="material-icons">Enviar</i> </span> </div>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <h5>Compañia</h5>
                        <ul class="list-unstyled company">
                            <li><a href="javascript:void(0)">Acerca de</a></li>
                            <li><a href="javascript:void(0)">Careers</a></li>
                            <li><a href="javascript:void(0)">Politica de privacidad</a></li>
                            <li><a href="javascript:void(0)">Contactanos</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <h5>¿Quieres trabajar con nosotros?</h5>
                        <p>Lorem Ipsum es simplemente un texto de relleno de la industria de impresión y tipografía. Lorem Ipsum ha sido el texto ficticio estándar de la industria desde la década de 1500, cuando una impresora desconocida tomó una galera de tipos y la revolvió para hacer un libro de muestras tipo. Ha sobrevivido no solo cinco siglos, sino también el salto a la composición electrónica, permaneciendo esencialmente sin cambios.</p>
                    </div>
                    <div class="col-sm-12">
                        <p class="copy m-b-0">© Copyright
                            <time class="year">2019</time>
                            Probills - All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
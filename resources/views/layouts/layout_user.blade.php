<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>:: PADRON ::</title>
<meta name="description" content="WrapTheme, Hospital Admin">
<meta name="keywords" content="adminX, Bootstrap4, Hospital, Angular4, Material Design">
<link rel="icon" href="{{asset('images/global/favicon.ico')}}" type="image/x-icon">
<link href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link href="{{asset('plugins/morrisjs/morris.css')}}" rel="stylesheet">
<link href="{{asset('css/estilo.css')}}" rel="stylesheet" />
<link href="{{asset('css/select2.css')}}" rel="stylesheet" />
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
<!-- Custom Css -->
<link href="{{asset('css/main.css')}}" rel="stylesheet">
<!--Admin build with sass and angular4 CLI kit -->
<link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet" />
</head>
<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
	<div class="loader">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
		<p>Please wait...</p>
	</div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<nav class="navbar clearHeader">
	<div class="navbar-header">
		<a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="{{route('index')}}"><img class="logo" src="{{asset('images/global/logo.svg')}}" alt="profile img">PADRON</a>	
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown menu-app"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"> <i class="zmdi zmdi-apps"></i> </a>
				<ul class="dropdown-menu">
					<li class="body">
						<ul class="menu">
							<li>
								<ul>
                                    <li><a href="{{route('perfil')}}"><i class="zmdi zmdi-account"></i><span>Perfil</span></a></li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
			</li>
			<li>
                <a href="{{ route('logout') }}" class="mega-menu" data-close="true" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="zmdi zmdi-power"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
		</ul>
	</div>
</nav>
<!-- #Top Bar --> 

<!--Side menu and right menu -->
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar"> 
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li> 
                <!-- User Info -->
                <div class="user-info">
                    <div class="admin-image"> <img src="{{asset('/images/perfil/'.Auth::user()->foto)}}" alt="profile img"> </div>
                    <div class="admin-action-info">
						<span>Bienvenido/a</span>
						<h3>{{Auth::user()->nombre}}</h3>
                        <ul>
                            <li><a data-placement="bottom" title="Ir al perfil" href="{{route('perfil')}}"><i class="zmdi zmdi-account"></i> Ir al perfil</a></li>
                        </ul>
                    </div>
                </div>
                <!-- #User Info --> 
            </li>
            <li class="header">NAVEGACIÓN PRINCIPAL</li>
            @if(Auth::user()->role_id == 1)
            <li class="active open"><a href="{{route('index')}}"><i class="zmdi zmdi-home"></i><span>Inicio</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-add"></i><span>Usuarios</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{route('crear_user')}}">Crear nuevo usuario</a></li>
                    <li><a href="{{route('lista_user')}}">Lista de usuarios</a></li>                       
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>Militantes</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{route('crear_militante')}}">Agregar militantes</a></li>
                    <li><a href="{{route('lista_militante')}}">Lista de militantes</a></li>
                    <li><a href="{{route('galeria_militante')}}">Galeria de militantes</a></li>                       
                    <li><a href="{{route('exportar_exel')}}">Exportar a Exel</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>Grupos de trabajo</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{route('crear_grupo')}}">Crear nuevo grupo</a></li>
                    <li><a href="{{route('lista_grupo')}}">Listar grupos</a></li>
                </ul>
            </li>
            <li><a href="{{route('reportes')}}"><i class="zmdi zmdi-file-text"></i><span>Reportes</span></a></li>
            <li><a href="{{route('edit_perfil')}}"><i class="zmdi zmdi-delicious"></i><span>Actualizar perfil</span></a></li>
            <li><a href="{{route('edit_password')}}"><i class="zmdi zmdi-delicious"></i><span>Cambiar contraseña</span></a></li>
            
            @elseif(Auth::user()->role_id == 2)
            <li class="active open"><a href=""><i class="zmdi zmdi-home"></i><span>Inicio</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>Militantes</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{route('crear_militante')}}">Agregar militantes</a></li>
                    <li><a href="{{route('lista_militante')}}">Lista de militantes</a></li>
                    <li><a href="{{route('galeria_militante')}}">Galeria de militantes</a></li>                       
                    <li><a href="{{route('exportar_exel')}}">Exportar a Exel</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>Grupos de trabajo</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{route('crear_grupo')}}">Crear nuevo grupo</a></li>
                    <li><a href="{{route('lista_grupo')}}">Listar grupos</a></li>
                </ul>
            </li>
            <li><a href="{{route('reportes')}}"><i class="zmdi zmdi-file-text"></i><span>Reportes</span></a></li>
            <li><a href="{{route('edit_perfil')}}"><i class="zmdi zmdi-delicious"></i><span>Actualizar perfil</span></a></li>
            <li><a href="{{route('edit_password')}}"><i class="zmdi zmdi-delicious"></i><span>Cambiar contraseña</span></a></li>
            @endif
        </ul>
    </div>
    <!-- #Menu --> 
</aside>
<!-- #END# Left Sidebar --> 
<!-- main content -->
<section class="content">
	<div class="container-fluid">
		@yield('content')
</section>
<!-- Jquery Core Js -->
<script src="{{asset('bundles/libscripts.bundle.js')}}"></script> <!-- Bootstrap JS and jQuery v3.2.1 --> 
<script src="{{asset('bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js --> 

<script src="{{asset('bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js --> 
<script src="{{asset('bundles/flotscripts.bundle.js')}}"></script><!-- Flot Charts Plugin Js --> 
<script src="{{asset('bundles/morrisscripts.bundle.js')}}"></script> <!-- Morris Plugin Js --> 
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script> <!-- Jquery Knob Plugin Js -->
<script src="{{asset('bundles/countto.bundle.js')}}"></script> <!-- Jquery CountTo Plugin Js -->

<script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script> <!-- JVectorMap Plugin Js --> 
<script src="{{asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script> <!-- JVectorMap Plugin Js --> 

<script src="{{asset('bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js --> 
<script src="{{asset('js/pages/index.js')}}"></script> 
<script src="{{asset('js/java.js')}}"></script> 
<script src="{{asset('js/pages/charts/sparkline.js')}}"></script> 
<script src="{{asset('js/pages/maps/jvectormap.js')}}"></script> 
<script src="{{asset('js/pages/charts/jquery-knob.js')}}"></script>
{{-- select2  --}}
<script src="{{asset('js/select2.js')}}"></script> 
<script src="{{asset('js/select2.min.js')}}"></script> 
{{-- highcharts  --}}
<script src="{{asset('js/highcharts.js')}}"></script>
<script src="{{asset('js/exporting.js')}}"></script>
<script src="{{asset('js/export-data.js')}}"></script>
</body>
</html>
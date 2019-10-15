<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>:: adminX Hospital::</title>
<meta name="description" content="WrapTheme, Hospital Admin">
<meta name="keywords" content="adminX, Bootstrap4, Hospital, Angular4, Material Design">
<link rel="icon" href="{{asset('images/global/favicon.ico')}}" type="image/x-icon">
<!-- Custom Css -->
<link href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{asset('css/main.css')}}" rel="stylesheet">
<link href="{{asset('css/login.css')}}" rel="stylesheet">

<!-- adminX You can choose a theme from css/themes instead of get all themes -->
<link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet" />
</head>

<body class="theme-cyan">
<div class="authentication">
    <div class="container-fluid">
        <div class="row clearfix">               
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 p-r-0">    
				@yield('content')
            </div>
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 p-l-0">
                <div class="l-detail">
                    <h5 class="position">¡bienvenido!</h5>
                    <h1 class="position"><img src="{{asset('images/global/logo.svg')}}" alt="profile img"><span>P</span>adron</h1>
                    <h3 class="position">INICIAR SESIÓN PARA ACCEDER</h3>
                    <p class="position">Sistema de gestion de Militantes y empedronamiento para partidos politicos.</p>                            
                    <ul class="list-unstyled l-social position">
                        <li><a href="#"><i class="zmdi zmdi-facebook-box"></i></a></li>                                
                        <li><a href="#"><i class="zmdi zmdi-linkedin-box"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-pinterest-box"></i></a></li>
                        <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>                            
                        <li><a href="#"><i class="zmdi zmdi-google-plus-box"></i></a></li>                                     
                    </ul>
                    <ul class="list-unstyled l-menu">
                        <li><a href="#">Contactos</a></li>                                
                        <li><a href="#">Acerca de</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js --> 
<script src="{{asset('bundles/libscripts.bundle.js')}}"></script> <!-- Bootstrap JS and jQuery v3.2.1 --> 
<script src="{{asset('bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js --> 
<script src="{{asset('bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js --> 
</body>
</html>

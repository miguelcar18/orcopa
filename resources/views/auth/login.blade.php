<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
    <head>
        <meta charset="utf-8">
        @section('titulo')
        <title>Login - Orcopa</title>
        @show
        <meta name="description" content="FreshUI is a Premium Web App and Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
        <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/apple-touch-icon-57x57-precomposed.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/apple-touch-icon-72x72-precomposed.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/apple-touch-icon-114x114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('img/apple-touch-icon-precomposed.png') }}">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- The Open Sans font is included from Google Web Fonts -->
        <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,800italic,300,400,800'>

        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

        <!-- Related styles of various icon packs and javascript plugins -->
        <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="{{ asset('css/themes/river.css') }}">

        <!-- Notification css (Toastr) -->
        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END Stylesheets -->

        <!-- Modernizr (Browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="{{ asset('js/vendor/modernizr-2.6.2-respond-1.3.0.min.js') }}"></script>
        @section('estilos')
        @show
    </head>

    <!-- Body -->
    <body>
        <!-- Login Container -->
        <div id="login-container">
            <!-- Page Content -->
            <div id="page-content" class="block remove-margin animation-bigEntrance">
                <!-- Login Title -->
                <div class="block-header">
                    <div class="header-section">
                        <h1 class="text-center"><i class="icon-user"></i> ORCOPA<br><small>Organización y control de pasantes</small></h1>
                    </div>
                </div>
                <!-- END Login Title -->
                @section('contenido')
                <!-- Login Content -->
                <!-- Login Form -->
                {!! Form::open(['route' => 'login', 'method' => 'post', 'id' => 'loginForm', 'name' => 'loginForm', 'class' => 'form-horizontal m-t-20 form-validate', 'novalidate' => 'novalidate']) !!}
                    <div class="form-group">
                        {!! Form::text('username', null, ['placeholder' => 'Nombre de usuario', 'class' => 'form-control input-lg', 'id' => 'username', 'required' => true]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::password('password', ['placeholder' => 'Contraseña', 'class' => 'form-control input-lg', 'id' => 'password', 'required' => true]) !!}
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-8"></div>
                            <div class="col-xs-4 text-right">
                                {!! Form::button('<i class="icon-angle-right"></i> Ingresar', ['class'=> 'btn btn-sm btn-primary', 'id' => 'loginButton', 'type' => 'submit']) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close()!!}
                <!-- END Login Form -->
                <p class="text-center"><small>¿Olvidó su clave de acceso?</small> <a href="{{ URL::route('password.request') }}"><small>Haga click aquí</small></a></p>
                <!-- END Login Content -->
                @show
            </div>
            <!-- END Page Content -->
        </div>
        <!-- END Login Container -->

        <!-- Get Jquery library from Google but if something goes wrong get Jquery from local file - Remove 'http:' if you have SSL -->
        <script src="{{ asset('js/vendor/jquery-1.10.2.min.js') }}"></script>
        <!-- Bootstrap.js, Jquery plugins and custom Javascript code -->
        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/toastr.min.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        @section('javascripts')
        @show
    </body>
</html>
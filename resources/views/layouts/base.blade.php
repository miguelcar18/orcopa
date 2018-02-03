<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
    <head>
        <meta charset="utf-8">
        @section('titulo')
        <title>Panel de inicio - Orcopa</title>
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
    <!-- In the PHP version you can set the following options from the config file -->
    <!--
        Add one of the following classes to the body element for the desirable feature:
        'sidebar-left-pinned'                         for a left pinned sidebar (always visible > 1200px)
        'sidebar-right-pinned'                        for a right pinned sidebar (always visible > 1200px)
        'sidebar-left-pinned sidebar-right-pinned'    for both sidebars pinned (always visible > 1200px)
    -->
    <body class="header-fixed-top sidebar-left-pinned">
        @include('layouts.sidebar')
        @include('layouts.sidebar-right')
         <!-- Page Container -->
        <!-- In the PHP version you can set the following options from the config file -->
        <!-- Add the class .full-width for a full width page (100%, 1920px max width) -->
        <div id="page-container">
            @include('layouts.header')
            <!-- FX Container -->
            <!-- In the PHP version you can set the following options from the config file -->
            <!--
                All effects apply in resolutions larger than 1200px width
                Add one of the following classes to #fx-container for setting an effect to main content when one of the sidebars are opened
                'fx-none'           remove all effects (better website performance)
                'fx-opacity'        opacity effect
                'fx-move'           move effect
                'fx-push'           push effect
                'fx-rotate'         rotate effect
                'fx-push-move'      push-move effect
                'fx-push-rotate'    push-rotate effect
            -->
            <div id="fx-container" class="fx-opacity">
                <!-- Page content -->
                <div id="page-content" class="block full">
                    @section('contenido')
                    @include('layouts.breadcrumb')
                    {{--
                    @include('layouts.breadcrum', ['titulo' => "Cursos", 'tituloModulo' => "Cursos", 'iconoModulo' => "Cursos"])
                    @include('layouts.breadcrum', ['titulo' => 'Nuevo curso', 'tituloModulo' => 'Cursos', 'rutaModulo' => URL::route('cursos.index'), 'tituloSubmodulo' => 'Nuevo curso', 'iconoModulo' => "Cursos"])
                    --}}
                    <!-- Blank Content -->
                    <p>Create your content..</p>
                    <!-- END Blank Content -->
                    @show
                </div>
                <!-- END Page Content -->
                @include('layouts.footer')
            </div>
            <!-- END FX Container -->
        </div>
        <!-- END Page Container -->

        <!-- Scroll to top link, check main.js - scrollToTop() -->
        <a href="javascript:void(0)" id="to-top"><i class="icon-angle-up"></i></a>

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
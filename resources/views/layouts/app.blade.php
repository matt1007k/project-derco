<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BSC Derco</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    
   
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg  navbar-dark bg-red">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    BSC Derco
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Crear cuenta') }}</a></li>
                        @else
                        <li><a class="nav-link" href="{{ route('mision.vision') }}">{{ __('Misión y Visión') }}</a></li>
                        <li><a class="nav-link" href="{{ route('valores') }}">{{ __('Valores') }}</a></li>
                        <li><a class="nav-link" href="{{ route('home') }}">{{ __('Cadena de valor') }}</a></li>
                        <li><a class="nav-link" href="{{ route('factores-internos') }}">{{ __('Factores Internos') }}</a></li>
                        <li><a class="nav-link" href="{{ route('factores-externos') }}">{{ __('Factores Externos') }}</a></li>
                        <li><a class="nav-link" href="{{ route('matriz-foda') }}">{{ __('Matriz FODA') }}</a></li>
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('fuerzas.index')}} " class="dropdown-item"> Fuerzas de Porter</a>
                                    <a href="{{ route('foda')}} " class="dropdown-item"> Estrategias FODA</a>
                                    <a href="{{ route('objetivos')}} " class="dropdown-item">Objetivos</a>
                                    <a href="{{ route('mapa-estrategico')}} " class="dropdown-item">Mapa</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if (session('info'))
            <div class="container">
                <div class="row">                    
                    <div class="col-xs-12 col-md-8 offset-md-2">
                        <div class="alert alert-success">
                            <strong>{{ session('info') }}</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
   
</body>
</html>

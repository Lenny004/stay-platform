<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Reserva hoteles y moteles en El Salvador de forma fácil y segura. Compara precios, encuentra hospedajes con las mejores ofertas y disfruta de estancias en hoteles con piscina, vista al mar y más. ¡Tu alojamiento ideal está aquí!">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-authenticated" content="{{ auth()->check() ? 'true' : 'false' }}">
    <title>@yield('title', 'Stay SV')</title>
    
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/desktop.css') }}" media="screen and (min-width: 1025px)">
    <link rel="stylesheet" href="{{ asset('css/tablet.css') }}" media="screen and (min-width: 769px) and (max-width: 1024px)">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}" media="screen and (max-width: 768px)">
    <link rel="stylesheet" href="{{ asset('css/fuente.css') }}">
    <link rel="icon" href="{{ asset('resources/imgs/stay_logo.png') }}">
</head>

<body>
    <div class="wrapper active">
        @include('components.header')

        <!-- Capa de fondo oscurecido -->
        <div id="overlay" class="overlay" onclick="closeSidenav()"></div>
        
        <!-- Sidenav -->
        @include('components.sidenav')

        @yield('content')

        @include('components.footer')
    </div>

    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/componentes.js') }}"></script>
    <script src="{{ asset('js/online.js') }}"></script>
    @stack('scripts')
</body>

</html>
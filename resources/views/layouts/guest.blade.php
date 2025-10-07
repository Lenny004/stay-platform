<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Stay</title>
    
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/desktop.css') }}" media="screen and (min-width: 1025px)">
    <link rel="stylesheet" href="{{ asset('css/tablet.css') }}" media="screen and (min-width: 769px) and (max-width: 1024px)">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}" media="screen and (max-width: 768px)">
    <link rel="stylesheet" href="{{ asset('css/fuente.css') }}">
    <link rel="icon" href="{{ asset('resources/imgs/stay_logo.png') }}">
</head>
<body>
    @yield('content')

    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/componentes.js') }}"></script>
    @stack('scripts')
</body>
</html>
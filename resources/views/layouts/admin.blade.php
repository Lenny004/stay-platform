<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Panel administrativo - Stay SV')</title>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/private.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fuente.css') }}">
    <link rel="icon" href="{{ asset('resources/imgs/stay_logo.png') }}">
    @stack('styles')
</head>

<body class="dashboard-body" data-login-url="{{ route('login') }}">
    <div class="dashboard-container">
        @include('components.admin.sidebar')

        <div id="modal-overlay" class="modal-overlay" aria-hidden="true"></div>
        @include('components.shared.modal')

        <main class="main-content">
            @include('components.admin.top-nav', ['title' => trim($__env->yieldContent('page-title', 'Dashboard'))])
            <section class="content-area" id="content-area">
                @yield('content')
            </section>
        </main>
    </div>

    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/componentes.js') }}"></script>
    <script src="{{ asset('js/admin/dashboard.js') }}"></script>
    @stack('scripts')
</body>

</html>

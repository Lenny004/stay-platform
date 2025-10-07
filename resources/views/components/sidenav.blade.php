<div id="sidenav" class="sidenav">
    <span class="closebtn" onclick="closeSidenav()">&times;</span>
    <a href="{{ route('home') }}">Inicio</a>
    <a href="#">Destacados</a> {{-- Temporal sin ruta --}}
    <hr>

    @guest
        <a href="{{ route('register') }}"><b>Regístrate</b></a>
        <a href="#">Iniciar Sesión</a> {{-- Temporal --}}
    @else
        <a href="{{ route('perfil') }}">Perfil</a>
        <a href="#" onclick="event.preventDefault(); logOut();">Cerrar Sesión</a>
    @endguest

    <a href="#">Divisa:
        @auth
            {{ auth()->user()->currency->symbol ?? 'USD' }}
        @else
            USD
        @endauth
    </a>
    <a href="#">Centro de Ayuda</a>
</div>
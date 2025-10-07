<header>
    <nav>
        <div class="navbar-left">
            <img class="logo-img" src="{{ asset('resources/imgs/stay_logo.png') }}" alt="logo">
            <h1>STAY SV</h1>
            <ul>
                <li>
                    <a href="{{ route('home') }}">Inicio</a>
                </li>
                <li>
                    <a href="#">Destacados</a> {{-- Temporal --}}
                </li>
            </ul>
        </div>
        <div class="navbar-right">
            <a href="#"><img src="{{ asset('resources/icons/global.png') }}" alt="divisa">
                @auth
                    {{ auth()->user()->currency->symbol ?? 'USD' }}
                @else
                    USD
                @endauth
            </a>
            <button class="navegacion" id="navegacion" onclick="openMenu()">
                <div class="menu-icon">
                    <img src="{{ asset('resources/icons/menu.png') }}" alt="menu" class="menu">
                </div>
                <div class="user-icon">
                    @auth
                        <img src="{{ auth()->user()->profile_image ?? asset('resources/imgs/user.jpg') }}" alt="user">
                    @else
                        <img src="{{ asset('resources/imgs/user.jpg') }}" alt="user">
                    @endauth
                </div>
            </button>
        </div>
        <div class="menu-drop" id="menu-drop" role="menu"></div>
    </nav>
</header>
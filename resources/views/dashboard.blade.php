@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<main>
    <!-- Modal de filtros -->
    <div id="modal" class="modal">
        <div class="modal-header">
            <h1>Filtros</h1>
            <span onclick="closeModal()"><img src="{{ asset('resources/icons/close.png') }}" alt="close"></span>
        </div>
        <hr>
        <div class="modal-content">
            <div class="centrar">
                <div class="content-pill pill-form">
                    <a href="#" class="content-pill_stage">Todos</a>
                    <a href="#" class="content-pill_stage">Casa</a>
                    <a href="#" class="content-pill_stage">Hotel</a>
                    <a href="#" class="content-pill_stage">Motel</a>
                </div>
            </div>
            <hr>
            <div class="opt-filters">
                <h2>Habitaciones y camas</h2>
                <div class="counter-container">
                    <label for="camas" class="left-label">Camas</label>
                    <div class="counter">
                        <button class="btn-minus" onclick="changeValue('camas', -1); return false;">−</button>
                        <span id="camas-value">0</span>
                        <button class="btn-plus" onclick="changeValue('camas', 1); return false;">+</button>
                    </div>
                </div>
                <div class="counter-container">
                    <label for="banos" class="left-label">Baños</label>
                    <div class="counter">
                        <button class="btn-minus" onclick="changeValue('banos', -1); return false;">−</button>
                        <span id="banos-value">0</span>
                        <button class="btn-plus" onclick="changeValue('banos', 1); return false;">+</button>
                    </div>
                </div>
            </div>
            <hr>
            <div class="opt-filters">
                <h2>Servicios</h2>
                <div class="content-pill" id="container_servicio">
                    <div class="content-pill_stage">
                        <input type="checkbox" id="wifi" name="amenities" value="wifi">
                        <label for="wifi" class="">Wi-Fi Gratis</label>
                        <img src="{{ asset('resources/icons/wifi.png') }}" alt="Wi-Fi Gratis">
                    </div>
                </div>
            </div>
            <hr>
            <div class="opt-filters">
                <h2>Actividades</h2>
                <div class="content-pill" id='actividades-container'></div>
            </div>
            <hr>
            <div class="opt-filters">
                <h2>Tipo de pago</h2>
                <div class="centrar" id="container_tipo"></div>
            </div>
            <hr>
            <div class="opt-filters">
                <h2>Zonas cercanas</h2>
                <div class="content-pill" id="zonaC-container"></div>
            </div>
            <hr>
            <div class="opt-filters">
                <h2>Calificación</h2>
                <div class="content-pill">
                    <a href="#" class="valoracion">
                        <img src="{{ asset('resources/icons/star.png') }}" alt="1"> 1
                    </a>
                    <a href="#" class="valoracion">
                        <img src="{{ asset('resources/icons/star.png') }}" alt="2"> 2
                    </a>
                    <a href="#" class="valoracion">
                        <img src="{{ asset('resources/icons/star.png') }}" alt="3"> 3
                    </a>
                    <a href="#" class="valoracion">
                        <img src="{{ asset('resources/icons/star.png') }}" alt="4"> 4
                    </a>
                    <a href="#" class="valoracion">
                        <img src="{{ asset('resources/icons/star.png') }}" alt="5"> 5
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="acciones">
            <a class="btn danger-button" id="btn-eliminar">Eliminar filtros</a>
            <a class="btn secundary-button" href="#">Buscar</a>
        </div>
    </div>

    <!-- Buscador -->
    <div class="centrar">
        <form class="form-buscar" id="buscador-form" autocomplete="off">
            <input class="input input-buscar" type="search" placeholder="¿A dónde quieres viajar?"
                aria-label="Search" name="buscar" id="buscar">
            <input class="input input-buscar" type="date" aria-label="Check-in" name="check_in" id="check_in">
            <input class="input input-buscar" type="date" aria-label="Check-out" name="check_out" id="check_out">
            <button type="submit"><img src="{{ asset('resources/icons/search.png') }}" alt="lupa"></button>
        </form>
    </div>

    <!-- Botón de filtros -->
    <div class="center">
        <div class="btn-filter">
            <img src="{{ asset('resources/icons/filters.png') }}" alt="">
            <a href="#" onclick="openModal()">Filtros</a>
        </div>
    </div>

    <!-- Contenedor de tarjetas de hoteles -->
    <div class="cards-container" id="cards-container">
        {{-- Las tarjetas se cargarán dinámicamente con JavaScript --}}
        @include('components.hotel-card-skeleton')
    </div>
</main>
@endsection

@push('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endpush
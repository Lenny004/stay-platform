@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<main class="login-container">
    <img src="{{ asset('resources/imgs/stay_logo.png') }}" alt="Stay Logo">
    <h1>¡Bienvenido de nuevo!</h1>

    <form method="POST" class="login-container__form" id="login_form" autocomplete="off">
        @csrf
        <h2>Iniciar sesión</h2>

        <div class="form-group">
            <label for="user">Usuario:</label>
            <input type="text" id="user" name="user" maxlength="50" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <div class="credenciales_login">
                <input type="password" id="password" name="password" maxlength="40" required>
                <img src="{{ asset('resources/icons/hidden.png') }}"
                    id="togglePassword"
                    alt="mostrar"
                    onclick="togglePasswordVisibility()" />
            </div>
        </div>

        <input type="submit" class="btn-login" value="Iniciar Sesión">
        <a class="underl" href="{{ route('password.request') }}">¿Olvidó su contraseña?</a>
    </form>

    <div class="login-links">
        <p>¿No tienes una cuenta todavía?</p>
        <a href="{{ route('register') }}">Crear cuenta</a>
    </div>
</main>

@include('components.footer')
@endsection

@push('scripts')
<script src="{{ asset('js/login.js') }}"></script>
@endpush
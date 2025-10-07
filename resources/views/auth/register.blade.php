@extends('layouts.guest')

@section('title', 'Crear Cuenta')

@section('content')
<main class="login-container">
    <img src="{{ asset('resources/imgs/stay_logo.png') }}" alt="Stay Logo">
    <h1>Crear una cuenta</h1>
    
    <form method="POST" class="login-container__form" id="register_form" autocomplete="off">
        @csrf
        
        <div class="form-group">
            <label for="nameU">Nombre completo:</label>
            <input type="text" id="nameU" name="nameU" maxlength="100" required>
        </div>
        
        <div class="form-group">
            <label for="user">Usuario:</label>
            <input type="text" id="user" name="user" maxlength="25" required>
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
        
        <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" maxlength="90" required>
        </div>
        
        <div class="form-group">
            <input type="number" class="visually-hidden" name="id_nacionalidad" id="id_nacionalidad" required>
            <label for="nationality">Nacionalidad:</label>
            <div class="select--wrap">
                <div class="select--text" id="toggleNationsButton">
                    <span>Seleccione una nacionalidad</span>
                    <div class="select--arrow"></div>
                </div>
                <div class="select--popup" id="optionsNations">
                    <div class="select--search">
                        <input>
                        <img class="select--searchIcon" src="{{ asset('resources/icons/search.png') }}" alt="search">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group visually-hidden" id="stateContainer">
            <input type="number" class="visually-hidden" name="id_state" id="id_state">
            <label for="state">Estado:</label>
            <div class="select--wrap">
                <div class="select--text" id="toggleStateButton">
                    <span>Seleccione un estado</span>
                    <div class="select--arrow"></div>
                </div>
                <div class="select--popup" id="optionsStates">
                    <div class="select--search">
                        <input>
                        <img class="select--searchIcon" src="{{ asset('resources/icons/search.png') }}" alt="search">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="phone">Número de teléfono:</label>
            <div class="phone-container">
                <input id="phone-suffix" name="phone-suffix" style="display: none;" readonly>
                <input type="tel" id="phone" name="phone" required>
            </div>
        </div>
        
        <div class="form-group">
            <label for="divisa">Divisa:</label>
            <select name="divisa" id="divisa" required>
                <option value="">Seleccione una divisa</option>
            </select>
        </div>
        
        <input type="submit" class="btn-login" value="Enviar">
    </form>
    
    <div class="login-links">
        <p>¿Ya tienes cuenta?</p>
        <a href="{{ route('login') }}">Ingresar en tu cuenta</a>
    </div>
</main>

@include('components.footer')
@endsection

@push('scripts')
<script src="{{ asset('js/register.js') }}"></script>
@endpush

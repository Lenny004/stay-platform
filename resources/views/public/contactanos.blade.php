@extends('layouts.app')

@section('title', 'Contáctanos')

@section('content')
<main class="login-container">
    <form class="login-container__form" autocomplete="off">
        <h1>Contáctanos</h1>
        <h2>Nos encantaría saber de ti</h2>

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" placeholder="nombre@ejemplo.com">
        </div>

        <div class="form-group">
            <label for="username">Nombre</label>
            <div class="credenciales_login">
                <input type="text" id="username" name="username" placeholder="Tu nombre completo">
            </div>
        </div>

        <div class="form-group">
            <label for="mensaje">Mensaje</label>
            <div class="credenciales_login">
                <textarea id="mensaje" name="mensaje" rows="4" placeholder="Cuéntanos en qué podemos ayudarte"></textarea>
            </div>
        </div>

        <button type="submit" class="btn-login">Enviar</button>

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3287.4227833372606!2d-89.25055963894253!3d13.703517712673847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f632fdfc58ce6c9%3A0x1a4964428f04629!2sLips%20Club%20Bar!5e0!3m2!1ses-419!2ssv!4v1743695674220!5m2!1ses-419!2ssv"
            style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </form>
</main>
@endsection

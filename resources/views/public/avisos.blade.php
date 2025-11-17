@extends('layouts.app')

@section('title', 'Aviso de privacidad')

@section('content')
<main>
    <div class="center">
        <div class="card">
            <div class="card-content">
                <h1>Aviso de privacidad</h1>
                <h3>Última actualización</h3>
                <div class="privacy">
                    <h3>1. Información recopilada</h3>
                    <p>Recopilamos los siguientes tipos de datos:</p>
                    <ul class="privacy-list">
                        <li class="privacy-item">Datos personales: nombre, apellido, correo electrónico, número de teléfono y documento de identidad cuando es necesario para validaciones.</li>
                        <li class="privacy-item">Datos de pago: información de tarjetas de crédito o débito y otros métodos de pago utilizados.</li>
                        <li class="privacy-item">Datos de reserva: historial de reservas, preferencias de alojamiento, valoraciones y opiniones.</li>
                        <li class="privacy-item">Datos técnicos: dirección IP, tipo de navegador, sistema operativo y cookies para mejorar la experiencia del usuario.</li>
                    </ul>

                    <h3>2. Uso de la información</h3>
                    <p>La información recopilada se utiliza para:</p>
                    <ul class="privacy-list">
                        <li class="privacy-item">Gestionar reservas y transacciones dentro de la plataforma.</li>
                        <li class="privacy-item">Verificar la identidad de los usuarios y reforzar la seguridad de las cuentas.</li>
                        <li class="privacy-item">Mejorar la experiencia del usuario mediante recomendaciones personalizadas.</li>
                        <li class="privacy-item">Cumplir con regulaciones legales y fiscales en El Salvador.</li>
                        <li class="privacy-item">Prevenir fraudes y actividades no autorizadas.</li>
                    </ul>

                    <h3>3. Protección y seguridad de los datos</h3>
                    <p>Implementamos medidas de seguridad físicas, electrónicas y administrativas para proteger la información contra accesos no autorizados, pérdida o alteración.</p>

                    <h3>4. Compartición de datos</h3>
                    <p>Solo compartimos datos cuando es necesario para el cumplimiento del servicio:</p>
                    <ul class="privacy-list">
                        <li class="privacy-item">Con hoteles y moteles afiliados para gestionar reservas.</li>
                        <li class="privacy-item">Con procesadores de pago certificados para transacciones seguras.</li>
                        <li class="privacy-item">Con autoridades legales si así lo requiere la normativa.</li>
                    </ul>

                    <h3>5. Derechos del usuario</h3>
                    <p>Los usuarios pueden acceder, rectificar, cancelar u oponerse al tratamiento de sus datos personales solicitándolo en <a href="mailto:staysvcompany@gmail.com">staysvcompany@gmail.com</a>.</p>

                    <h3>6. Modificaciones al aviso de privacidad</h3>
                    <p>Nos reservamos el derecho de modificar este aviso de privacidad y notificaremos a los usuarios cuando existan cambios relevantes.</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

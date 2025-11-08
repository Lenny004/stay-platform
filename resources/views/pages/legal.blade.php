@extends('layouts.app')

@section('title', 'Información legal')

@section('content')
<main>
    <div class="center">
        <div class="card">
            <div class="card-content">
                <h1>Información legal</h1>
                <h3>Última actualización</h3>
                <div class="privacy">
                    <h3>1. Registro y regulación</h3>
                    <p>Stay SV es una plataforma registrada en El Salvador y cumple con las normativas de comercio electrónico, protección al consumidor y privacidad de datos establecidas en la legislación salvadoreña.</p>

                    <h3>2. Protección de datos</h3>
                    <p>Cumplimos con la Ley de Protección de Datos Personales de El Salvador, garantizando la seguridad y confidencialidad de la información de nuestros usuarios.</p>

                    <h3>3. Responsabilidad legal</h3>
                    <ul class="privacy-list">
                        <li class="privacy-item">Stay SV no se hace responsable por daños directos o indirectos derivados del uso de la plataforma.</li>
                        <li class="privacy-item">En caso de disputas, estas se resolverán conforme a la legislación vigente en El Salvador.</li>
                    </ul>

                    <h3>4. Contacto legal</h3>
                    <p>Para cualquier consulta legal, puedes escribirnos a <a href="mailto:staysvcompany@gmail.com">staysvcompany@gmail.com</a>.</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

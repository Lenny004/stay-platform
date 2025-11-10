@extends('layouts.app')

@section('title', 'Stay | Perfil')

@section('content')
<main class="center" id="perfil-container">
	<div class="card-perfil box-sd">
		<img src="{{ asset('resources/imgs/user.jpg') }}" alt="perfil_photo">
		<div class="card-perfil-content">
			<h1>Hola, Soy ${userData.name}</h1>
			<h3>21 Reservas</h3>
			<h3>${añosEnStay} años en Stay</h3>
			<a class="btn secundary-button" onclick="openModal()">Editar Perfil</a>
			<a class="btn primary-button" onclick="openPasswordModal()" style="margin-top: 10px;">Cambiar Contraseña</a>
		</div>
	</div>
	<!-- Información adicional del usuario -->
	<p><b>${userData.nacionalidad}</b></p>
	<div class="perfil-item">
		<img src="{{ asset('resources/icons/star_perfil.png') }}" alt="Gran visitante" class="perfil-icon">
		<span>Gran visitante</span>
	</div>
	<div class="perfil-item">
		<img src="{{ asset('resources/icons/comentario.png') }}" alt="100 comentarios" class="perfil-icon">
		<span>100 comentarios</span>
	</div>
	<div class="perfil-item">
		<img src="{{ asset('resources/icons/verificado.png') }}" alt="Verificación" class="perfil-icon">
		<span>Verificación</span>
	</div>
	<a href="{{ route('reservation_history') }}" class="underl">Ver historial Reservaciones</a>
	<a href="{{ route('reviews') }}" class="underl">Ver tus opiniones</a>
</main>

<!-- Modal para editar perfil -->
<div id="modal" class="modal modal-sm">
	<div class="modal-header">
		<h1>Editar Perfil</h1>
		<span onclick="closeModal()"><img src="{{ asset('resources/icons/close.png') }}" alt="close"></span>
	</div>
	<hr>
	<form method="post" class="modal_opinion" id="perfil_form" autocomplete="off">
		<div class="modal-content">
			<div class="form-group">
				<label for="edit_email">Email:</label>
				<input type="email" name="edit_email" id="edit_email" placeholder="Tu email" readonly>
			</div>
			<div class="form-group">
				<label for="edit_phone">Teléfono:</label>
				<input type="tel" name="edit_phone" id="edit_phone" placeholder="Tu número de teléfono" readonly>
			</div>
			<hr>
		</div>
		<div class="acciones">
			<a class="btn danger-button" onclick="closeModal()">Cerrar</a>
			<input type="submit" value="Guardar Cambios" class="btn secundary-button d-none" id="saveChangesBtn">
			<a href="#" class="btn primary-button" id="enableEditing" onclick="enableEditing()">Habilitar Edición</a>
		</div>
	</form>
</div>

<!-- Modal para cambiar contraseña -->
<div id="changePasswordModal" class="modal modal-sm">
	<div class="modal-header">
		<h1>Cambiar Contraseña</h1>
		<span onclick="closePasswordModal()"><img src="{{ asset('resources/icons/close.png') }}" alt="close"></span>
	</div>
	<hr>
	<div class="modal-content">
		<form method="post" class="modal_opinion" id="password_form" autocomplete="off">
			<div class="form-group">
				<label for="password">Contraseña actual:</label>
				<div class="credenciales_login">
					<input type="password" id="password" name="password" maxlength="40" required>
					<img src="{{ asset('resources/icons/hidden.png') }}" id="togglePassword" alt="mostrar" onclick="togglePasswordVisibility('password', 'togglePassword')">
				</div>
			</div>
			<div class="form-group">
				<label for="new_password">Nueva Contraseña:</label>
				<div class="credenciales_login">
					<input type="password" id="new_password" name="new_password" maxlength="40" required>
					<img src="{{ asset('resources/icons/hidden.png') }}" id="toggleNewPassword" alt="mostrar" onclick="togglePasswordVisibility('new_password', 'toggleNewPassword')">
				</div>
			</div>
			<div class="form-group">
				<label for="confirm_password">Confirmar Nueva Contraseña:</label>
				<div class="credenciales_login">
					<input type="password" id="confirm_password" name="confirm_password" maxlength="40" required>
					<img src="{{ asset('resources/icons/hidden.png') }}" id="toggleConfirmPassword" alt="mostrar" onclick="togglePasswordVisibility('confirm_password', 'toggleConfirmPassword')">
				</div>
			</div>
			<hr>
			<div class="acciones">
				<a class="btn danger-button" onclick="closePasswordModal()">Cerrar</a>
				<input type="submit" value="Cambiar Contraseña" class="btn secundary-button">
			</div>
		</form>
	</div>
</div>
@endsection

@push('scripts')

@endpush
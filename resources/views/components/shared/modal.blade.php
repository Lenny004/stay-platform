<div class="modal modal-sm" id="modal" role="dialog" aria-modal="true" aria-hidden="true">
	<div class="modal__header hor">
		<h1 id="modal__header--title">Enviar mensaje</h1>
		<a class="icon" data-close-modal aria-label="Cerrar modal">
			<img src="{{ asset('resources/icons/close.png') }}" alt="Cerrar">
        </a>
	</div>

	<form method="POST" class="modal__content" id="modal-form" autocomplete="off">
		@csrf
		<div class="modal__section hor">
			<div class="form-group">
				<label for="modal-receiver">Para:</label>
				<select id="modal-receiver" name="receiver" required>
					<option value="" selected disabled>Seleccione un usuario</option>
					<option value="admin">Administrador</option>
					<option value="hotel">Hotelero</option>
					<option value="client">Cliente</option>
				</select>
			</div>
			<div class="form-group">
				<label for="modal-subject">Asunto:</label>
				<input type="text" id="modal-subject" name="subject" maxlength="60" required>
			</div>
			<div class="form-group">
				<label for="modal-location">Localidad:</label>
				<input type="text" id="modal-location" name="location" maxlength="40">
			</div>
		</div>
		<div class="modal__section">
			<div class="form-group" style="width:100%;">
				<label for="modal-message">Mensaje:</label>
				<textarea id="modal-message" name="message" rows="4" maxlength="250" required></textarea>
			</div>
		</div>
		<div class="modal__actions">
			<button type="button" class="btn btn--refresh action-btn" data-close-modal>Cancelar</button>
			<button type="submit" class="btn primary-button action-btn" id="modal-submit">Enviar</button>
		</div>
	</form>
</div>

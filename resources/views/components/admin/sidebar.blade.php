@php
	$asset = fn (string $path) => asset('resources/icons/' . $path);
	$userAccessActive = request()->routeIs('admin.settings.user-types.*', 'admin.settings.hotel-status.*');
	$geographicActive = request()->routeIs('admin.settings.nationalities.*', 'admin.settings.us-states.*', 'admin.settings.departments.*');
	$financialActive = request()->routeIs('admin.settings.currencies.*', 'admin.settings.payment-status.*');
	$amenitiesActive = request()->routeIs(
		'admin.settings.foods.*',
		'admin.settings.payment-methods.*',
		'admin.settings.accommodation-types.*',
		'admin.settings.nearby-areas.*',
		'admin.settings.services.*',
		'admin.settings.activities.*',
		'admin.settings.tags.*'
	);
@endphp

<nav class="sidenav" id="sidenav">
	<div class="sidenav-header">
		<img class="logo-img" src="{{ asset('resources/imgs/stay_logo.png') }}" alt="Logo Stay SV">
		<h1>STAY SV</h1>
	</div>

	<ul class="sidenav-list">
		<li class="sidenav-label">Home</li>
		<li class="sidenav-button {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" data-section="dashboard">
			<button type="button" data-url="{{ route('admin.dashboard') }}">
				<img class="icon icon--image"
					src="{{ $asset('dashboard.png') }}"
					data-icon-active="{{ $asset('dashboard.png') }}"
					data-icon-inactive="{{ $asset('dashboard_g.png') }}"
					alt="Ir al dashboard">
				<span class="text">Dashboard</span>
			</button>
		</li>
		<li class="sidenav-button" data-section="profile">
			<button type="button">
				<img class="icon icon--image"
					src="{{ $asset('profile_g.png') }}"
					data-icon-active="{{ $asset('profile.png') }}"
					data-icon-inactive="{{ $asset('profile_g.png') }}"
					alt="Configuración personal">
				<span class="text">Configuración personal</span>
			</button>
		</li>
	</ul>

	<ul class="sidenav-list">
		<li class="sidenav-label">Características</li>
		<li class="sidenav-button" data-section="hotels">
			<button type="button">
				<img class="icon icon--image"
					src="{{ $asset('hotel_g.png') }}"
					data-icon-active="{{ $asset('hotel.png') }}"
					data-icon-inactive="{{ $asset('hotel_g.png') }}"
					alt="Gestión de hoteles">
				<span class="text">Hotel</span>
			</button>
		</li>
		<li class="sidenav-button" data-section="room-types">
			<button type="button">
				<img class="icon icon--image"
					src="{{ $asset('door_g.png') }}"
					data-icon-active="{{ $asset('door.png') }}"
					data-icon-inactive="{{ $asset('door_g.png') }}"
					alt="Tipos de habitaciones">
				<span class="text">Tipos de Habitaciones</span>
			</button>
		</li>
		<li class="sidenav-button" data-section="rooms">
			<button type="button">
				<img class="icon icon--image"
					src="{{ $asset('room_g.png') }}"
					data-icon-active="{{ $asset('room.png') }}"
					data-icon-inactive="{{ $asset('room_g.png') }}"
					alt="Habitaciones disponibles">
				<span class="text">Habitaciones</span>
			</button>
		</li>
	</ul>

	<ul class="sidenav-list">
		<li class="sidenav-label">Configuraciones</li>

		<li class="sidenav-button sidenav-accordion {{ $userAccessActive ? 'expanded' : '' }}">
			<button type="button" class="sidenav-accordion-toggle" aria-expanded="{{ $userAccessActive ? 'true' : 'false' }}">
				<img class="icon icon--image"
					src="{{ $asset('setting_user_g.png') }}"
					data-icon-active="{{ $asset('setting_user.png') }}"
					data-icon-inactive="{{ $asset('setting_user_g.png') }}"
					alt="Configuraciones de usuarios">
				<span class="text">Usuarios y Acceso</span>
				<span class="chevron" aria-hidden="true"></span>
			</button>
			<ul class="sidenav-sublist" {{ $userAccessActive ? '' : 'hidden' }}>
				<li class="sidenav-button sidenav-button--child {{ request()->routeIs('admin.settings.user-types.*') ? 'active' : '' }}" data-section="user-types">
					<button type="button" data-url="{{ route('admin.settings.user-types.index') }}">
						<img class="icon icon--image"
							src="{{ $asset('user_g.png') }}"
							data-icon-active="{{ $asset('user.png') }}"
							data-icon-inactive="{{ $asset('user_g.png') }}"
							alt="Usuarios del sistema">
						<span class="text">Usuarios</span>
					</button>
				</li>
				<li class="sidenav-button sidenav-button--child {{ request()->routeIs('admin.settings.hotel-status.*') ? 'active' : '' }}" data-section="hotel-status">
					<button type="button" data-url="{{ route('admin.settings.hotel-status.index') }}">
						<img class="icon icon--image"
							src="{{ $asset('status_h_g.png') }}"
							data-icon-active="{{ $asset('status_h.png') }}"
							data-icon-inactive="{{ $asset('status_h_g.png') }}"
							alt="Estado del hotel">
						<span class="text">Estado de Hotel</span>
					</button>
				</li>
			</ul>
		</li>

		<li class="sidenav-button sidenav-accordion {{ $geographicActive ? 'expanded' : '' }}">
			<button type="button" class="sidenav-accordion-toggle" aria-expanded="{{ $geographicActive ? 'true' : 'false' }}">
				<img class="icon icon--image"
					src="{{ $asset('geography_g.png') }}"
					data-icon-active="{{ $asset('geography.png') }}"
					data-icon-inactive="{{ $asset('geography_g.png') }}"
					alt="Configuraciones geográficas">
				<span class="text">Geográficos</span>
				<span class="chevron" aria-hidden="true"></span>
			</button>
			<ul class="sidenav-sublist" {{ $geographicActive ? '' : 'hidden' }}>
				<li class="sidenav-button sidenav-button--child {{ request()->routeIs('admin.settings.nationalities.*') ? 'active' : '' }}" data-section="nationalities">
					<button type="button" data-url="{{ route('admin.settings.nationalities.index') }}">
						<img class="icon icon--image"
							src="{{ $asset('passport_g.png') }}"
							data-icon-active="{{ $asset('passport.png') }}"
							data-icon-inactive="{{ $asset('passport_g.png') }}"
							alt="Nacionalidades">
						<span class="text">Nacionalidades</span>
					</button>
				</li>
				<li class="sidenav-button sidenav-button--child {{ request()->routeIs('admin.settings.us-states.*') ? 'active' : '' }}" data-section="us-states">
					<button type="button" data-url="{{ route('admin.settings.us-states.index') }}">
						<img class="icon icon--image"
							src="{{ $asset('place_g.png') }}"
							data-icon-active="{{ $asset('place.png') }}"
							data-icon-inactive="{{ $asset('place_g.png') }}"
							alt="Estados de EE.UU.">
						<span class="text">Estados EE.UU</span>
					</button>
				</li>
				<li class="sidenav-button sidenav-button--child {{ request()->routeIs('admin.settings.departments.*') ? 'active' : '' }}" data-section="departments">
					<button type="button" data-url="{{ route('admin.settings.departments.index') }}">
						<img class="icon icon--image"
							src="{{ $asset('place_g.png') }}"
							data-icon-active="{{ $asset('place.png') }}"
							data-icon-inactive="{{ $asset('place_g.png') }}"
							alt="Departamentos">
						<span class="text">Departamentos</span>
					</button>
				</li>
			</ul>
		</li>

		<li class="sidenav-button sidenav-accordion {{ $financialActive ? 'expanded' : '' }}">
			<button type="button" class="sidenav-accordion-toggle" aria-expanded="{{ $financialActive ? 'true' : 'false' }}">
				<img class="icon icon--image"
					src="{{ $asset('money_g.png') }}"
					data-icon-active="{{ $asset('money.png') }}"
					data-icon-inactive="{{ $asset('money_g.png') }}"
					alt="Configuraciones financieras">
				<span class="text">Financieros</span>
				<span class="chevron" aria-hidden="true"></span>
			</button>
			<ul class="sidenav-sublist" {{ $financialActive ? '' : 'hidden' }}>
				<li class="sidenav-button sidenav-button--child {{ request()->routeIs('admin.settings.currencies.*') ? 'active' : '' }}" data-section="currencies">
					<button type="button" data-url="{{ route('admin.settings.currencies.index') }}">
						<img class="icon icon--image"
							src="{{ $asset('divisa_g.png') }}"
							data-icon-active="{{ $asset('divisa.png') }}"
							data-icon-inactive="{{ $asset('divisa_g.png') }}"
							alt="Divisas">
						<span class="text">Divisas</span>
					</button>
				</li>
				<li class="sidenav-button sidenav-button--child {{ request()->routeIs('admin.settings.payment-status.*') ? 'active' : '' }}" data-section="payment-status">
					<button type="button" data-url="{{ route('admin.settings.payment-status.index') }}">
						<img class="icon icon--image"
							src="{{ $asset('status_payment_g.png') }}"
							data-icon-active="{{ $asset('status_payment.png') }}"
							data-icon-inactive="{{ $asset('status_payment_g.png') }}"
							alt="Estados de pago">
						<span class="text">Estados de Pago</span>
					</button>
				</li>
			</ul>
		</li>

		<li class="sidenav-button sidenav-accordion {{ $amenitiesActive ? 'expanded' : '' }}">
			<button type="button" class="sidenav-accordion-toggle" aria-expanded="{{ $amenitiesActive ? 'true' : 'false' }}">
				<img class="icon icon--image"
					src="{{ $asset('amenities_g.png') }}"
					data-icon-active="{{ $asset('amenities.png') }}"
					data-icon-inactive="{{ $asset('amenities_g.png') }}"
					alt="Amenidades">
				<span class="text">Amenidades</span>
				<span class="chevron" aria-hidden="true"></span>
			</button>
			<ul class="sidenav-sublist" {{ $amenitiesActive ? '' : 'hidden' }}>
				<li class="sidenav-button sidenav-button--child {{ request()->routeIs('admin.settings.foods.*') ? 'active' : '' }}" data-section="foods">
					<button type="button" data-url="{{ route('admin.settings.foods.index') }}">
						<img class="icon icon--image"
							src="{{ $asset('food_g.png') }}"
							data-icon-active="{{ $asset('food.png') }}"
							data-icon-inactive="{{ $asset('food_g.png') }}"
							alt="Comidas">
						<span class="text">Comidas</span>
					</button>
				</li>
				<li class="sidenav-button sidenav-button--child {{ request()->routeIs('admin.settings.payment-methods.*') ? 'active' : '' }}" data-section="payment-methods">
					<button type="button" data-url="{{ route('admin.settings.payment-methods.index') }}">
						<img class="icon icon--image"
							src="{{ $asset('paymethod_g.png') }}"
							data-icon-active="{{ $asset('paymethod.png') }}"
							data-icon-inactive="{{ $asset('paymethod_g.png') }}"
							alt="Métodos de pago">
						<span class="text">Métodos de pago</span>
					</button>
				</li>
				<li class="sidenav-button sidenav-button--child {{ request()->routeIs('admin.settings.accommodation-types.*') ? 'active' : '' }}" data-section="accommodation-types">
					<button type="button" data-url="{{ route('admin.settings.accommodation-types.index') }}">
						<img class="icon icon--image"
							src="{{ $asset('booking_g.png') }}"
							data-icon-active="{{ $asset('booking.png') }}"
							data-icon-inactive="{{ $asset('booking_g.png') }}"
							alt="Tipos de alojamiento">
						<span class="text">Tipos de alojamiento</span>
					</button>
				</li>
				<li class="sidenav-button sidenav-button--child {{ request()->routeIs('admin.settings.nearby-areas.*') ? 'active' : '' }}" data-section="nearby-areas">
					<button type="button" data-url="{{ route('admin.settings.nearby-areas.index') }}">
						<img class="icon icon--image"
							src="{{ $asset('near_g.png') }}"
							data-icon-active="{{ $asset('near.png') }}"
							data-icon-inactive="{{ $asset('near_g.png') }}"
							alt="Zonas cercanas">
						<span class="text">Zonas cercanas</span>
					</button>
				</li>
				<li class="sidenav-button sidenav-button--child {{ request()->routeIs('admin.settings.services.*') ? 'active' : '' }}" data-section="services">
					<button type="button" data-url="{{ route('admin.settings.services.index') }}">
						<img class="icon icon--image"
							src="{{ $asset('service_g.png') }}"
							data-icon-active="{{ $asset('service.png') }}"
							data-icon-inactive="{{ $asset('service_g.png') }}"
							alt="Servicios">
						<span class="text">Servicios</span>
					</button>
				</li>
				<li class="sidenav-button sidenav-button--child {{ request()->routeIs('admin.settings.activities.*') ? 'active' : '' }}" data-section="activities">
					<button type="button" data-url="{{ route('admin.settings.activities.index') }}">
						<img class="icon icon--image"
							src="{{ $asset('activity_g.png') }}"
							data-icon-active="{{ $asset('activity.png') }}"
							data-icon-inactive="{{ $asset('activity_g.png') }}"
							alt="Actividades">
						<span class="text">Actividades</span>
					</button>
				</li>
				<li class="sidenav-button sidenav-button--child {{ request()->routeIs('admin.settings.tags.*') ? 'active' : '' }}" data-section="tags">
					<button type="button" data-url="{{ route('admin.settings.tags.index') }}">
						<img class="icon icon--image"
							src="{{ $asset('tag_g.png') }}"
							data-icon-active="{{ $asset('tag.png') }}"
							data-icon-inactive="{{ $asset('tag_g.png') }}"
							alt="Etiquetas">
						<span class="text">Tags</span>
					</button>
				</li>
			</ul>
		</li>
	</ul>

	<ul class="sidenav-list">
		<li class="sidenav-label">Extra</li>
		<li class="sidenav-button" data-section="logout">
			<button type="button" data-action="logout" data-url="{{ route('logout') }}">
				<img class="icon icon--image"
					src="{{ $asset('exit_g.png') }}"
					data-icon-active="{{ $asset('exit.png') }}"
					data-icon-inactive="{{ $asset('exit_g.png') }}"
					alt="Cerrar sesión">
				<span class="text">Cerrar sesión</span>
			</button>
		</li>
	</ul>
</nav>

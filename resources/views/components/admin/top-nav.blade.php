@php
	$title = $title ?? 'Dashboard';
	$user = auth()->user();
	$defaultAvatar = asset('resources/imgs/user.jpg');
	$profileImage = $defaultAvatar;

	if ($user && $user->profile_image) {
		$profileImage = filter_var($user->profile_image, FILTER_VALIDATE_URL)
			? $user->profile_image
			: asset($user->profile_image);
	}
@endphp

<nav class="topnav">
	<div class="navbar-left">
		<a class="toggle-btn" id="menu-toggle" aria-label="Alternar navegación lateral">
			<img src="{{ asset('resources/icons/menu.png') }}" alt="Menú">
        </a>
		<h1 id="section-title">{{ $title }}</h1>
	</div>
	<div class="navbar-right">
		<a href="#" id="theme-toggle-link" aria-label="Cambiar tema">
			<img
				id="theme-icon"
				src="{{ asset('resources/icons/sun.png') }}"
				data-sun-icon="{{ asset('resources/icons/sun.png') }}"
				data-moon-icon="{{ asset('resources/icons/moon.png') }}"
				alt="Tema">
		</a>
		<div class="user-icon" title="{{ $user?->full_name ?? 'Usuario' }}">
			<img src="{{ $profileImage }}" alt="Avatar del usuario">
		</div>
	</div>
</nav>

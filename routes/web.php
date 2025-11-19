<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HotelController;

// ===== PÁGINA PRINCIPAL (DASHBOARD PÚBLICO) =====
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard.public');

// ===== PÁGINAS PÚBLICAS =====
Route::get('/favoritos', function () {
    return view('favoritos');
})->name('favoritos');

Route::view('/avisos', 'public.avisos')->name('avisos');
Route::view('/contactanos', 'public.contactanos')->name('contact');
Route::view('/legal', 'public.legal')->name('legal');
Route::view('/terminos', 'public.terminos')->name('terminos');

// ===== AUTENTICACIÓN =====
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::get('/registro', [RegisterController::class, 'show'])->name('register');
    Route::post('/registro', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/password/request', function () {
        return view('auth.forgot-password');
    })->name('password.request');
});

// ===== APIs PÚBLICAS =====
Route::prefix('api')->group(function () {
    Route::get('/divisas', [RegisterController::class, 'getDivisas']);
    Route::get('/nacionalidades', [RegisterController::class, 'getNationalities']);
    Route::get('/estados-usa', [RegisterController::class, 'getStatesUSA']);
    Route::post('/sufijo-telefono', [RegisterController::class, 'getPhoneSuffix']);

    // APIs para el dashboard
    //Route::get('/hoteles', [HotelController::class, 'index']);
    //Route::get('/servicios', [HotelController::class, 'getServicios']);
    //Route::get('/actividades', [HotelController::class, 'getActividades']);
});

// ===== ADMINISTRACIÓN =====
Route::middleware(['auth', 'admin.access'])->prefix('admin')->as('admin.')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
});

// ===== RUTAS PROTEGIDAS =====
Route::middleware('auth')->group(function () {
    Route::get('/perfil', function () {
        return view('public.profile.profile');
    })->name('perfil');
    Route::get('/reservation_history', function () {
        return view('public.profile.reservations');
    })->name('reservation_history');
    Route::get('/reviews', function () {
        return view('public.profile.reviews');
    })->name('reviews');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

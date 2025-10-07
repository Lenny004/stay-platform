<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HotelController;

// ===== PÁGINA PRINCIPAL (DASHBOARD PÚBLICO) =====
Route::get('/', function () {
    return view('dashboard');
})->name('home');

// ===== PÁGINAS PÚBLICAS =====
Route::get('/favoritos', function () {
    return view('favoritos');
})->name('favoritos');

// ===== AUTENTICACIÓN =====
Route::middleware('guest')->group(function () {
    //Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    //Route::post('/login', [LoginController::class, 'login']);
    
    Route::get('/registro', [RegisterController::class, 'show'])->name('register');
    Route::post('/registro', [RegisterController::class, 'store']);
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

// ===== RUTAS PROTEGIDAS =====
Route::middleware('auth')->group(function () {
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');
    
    //Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
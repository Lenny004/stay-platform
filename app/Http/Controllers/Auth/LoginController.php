<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $request->validate([
            'user' => 'required|string',
            'password' => 'required|string'
        ]);

        // Buscar usuario por username
        $user = User::where('username', $request->user)->first();

        // Verificar si existe y la contraseña es correcta
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'estado' => 0,
                'exception' => 'El usuario o la contraseña ingresados no son válidos'
            ]);
        }

        // Login exitoso
        Auth::login($user);
        $request->session()->regenerate();

        $redirect = (int) $user->user_type_id === 3
            ? $this->buildRedirectPath($request)
            : $this->buildRedirectPath($request, 'admin/dashboard');

        return response()->json([
            'estado' => 1,
            'message' => 'Credenciales correctas',
            'redirect' => $redirect
        ]);
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'estado' => 1,
            'message' => 'Sesión cerrada exitosamente'
        ]);
    }

    private function buildRedirectPath(Request $request, string $path = ''): string
    {
        $base = rtrim($request->getBaseUrl(), '/');
        $cleanPath = ltrim($path, '/');

        if ($cleanPath === '') {
            return $base === '' ? '/' : $base . '/';
        }

        return ($base === '' ? '' : $base . '/') . $cleanPath;
    }

}

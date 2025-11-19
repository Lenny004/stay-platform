<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Nationality;
use App\Models\Currency;
use App\Models\UsState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    // Mostrar formulario de registro
    public function show()
    {
        return view('auth.register');
    }

    // Procesar registro
    public function store(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'full_name' => $request->nameU,
                'username' => $request->user,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_country_code' => $request->input('phone-suffix'),
                'local_phone' => $request->phone,
                'currency_id' => $request->divisa,
                'nationality_id' => $request->id_nacionalidad,
                'us_state_id' => $request->id_state,
                'user_type_id' => 3, // Cliente por defecto
            ]);

            return response()->json([
                'estado' => 1,
                'message' => 'Usuario registrado correctamente',
                'redirect' => $this->buildRedirectPath($request, 'login')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'exception' => 'Error al registrar usuario: ' . $e->getMessage()
            ], 500);
        }
    }

    // API: Obtener divisas
    public function getDivisas()
    {
        try {
            $divisas = Currency::select('id', DB::raw("CONCAT(currency, ' (', symbol, ')') as name"))
                ->get()
                ->map(function($divisa) {
                    return [
                        'id_divisa' => $divisa->id,
                        'name' => $divisa->name
                    ];
                });

            return response()->json([
                'estado' => 1,
                'dataset' => $divisas
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'exception' => 'No hay divisas registradas'
            ]);
        }
    }

    // API: Obtener nacionalidades
    public function getNationalities()
    {
        try {
            $nationalities = Nationality::select('id as id_nacionalidad', 'country_name as nombre_pais')
                ->get();

            return response()->json([
                'estado' => 1,
                'dataset' => $nationalities
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'exception' => 'No hay nacionalidades registradas'
            ]);
        }
    }

    // API: Obtener estados de USA
    public function getStatesUSA()
    {
        try {
            $states = UsState::select(
                'id as id_estado_usa',
                DB::raw("CONCAT(state_name, ' (+', state_code, ')') as nombre_estado"),
                'state_code as codigo_estado'
            )->get();

            return response()->json([
                'estado' => 1,
                'dataset' => $states
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'exception' => 'No hay estados registrados'
            ]);
        }
    }

    // API: Obtener sufijo telefónico por nacionalidad
    public function getPhoneSuffix(Request $request)
    {
        try {
            $nationality = Nationality::find($request->nationalityId);

            if (!$nationality) {
                return response()->json([
                    'estado' => 0,
                    'exception' => 'Nacionalidad no encontrada'
                ]);
            }

            return response()->json([
                'estado' => 1,
                'codigo_pais' => $nationality->country_code
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'exception' => 'Error al obtener sufijo'
            ]);
        }
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

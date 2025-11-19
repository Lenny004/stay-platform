<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsNotClient
{
    /**
     * Ensure authenticated user has access to private admin area.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user || (int) $user->user_type_id === 3) {
            if ($request->expectsJson()) {
                return response()->json([
                    'estado' => 0,
                    'exception' => 'No autorizado para acceder al panel administrativo.'
                ], 403);
            }

            return redirect($this->buildPath($request));
        }

        return $next($request);
    }

    private function buildPath(Request $request, string $path = ''): string
    {
        $base = rtrim($request->getBaseUrl(), '/');
        $cleanPath = ltrim($path, '/');

        if ($cleanPath === '') {
            return $base === '' ? '/' : $base . '/';
        }

        return ($base === '' ? '' : $base . '/') . $cleanPath;
    }
}

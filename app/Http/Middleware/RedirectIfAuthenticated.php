<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                if ($user && (int) $user->user_type_id !== 3) {
                    return redirect($this->buildPath($request, 'admin/dashboard'));
                }

                return redirect($this->buildPath($request));
            }
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

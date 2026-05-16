<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Pastikan user sudah login
        if (!$request->user() || !$request->user()->role) {
            return redirect()->route('login')->with('error', 'Please log in first before starting');
        }

        // Ambil nama role user saat ini
        $userRole = $request->user()->role->name;

        // Cek apakah role user ada di dalam daftar roles yang diizinkan
        if (!in_array($userRole, $roles)) {
            // Jika tidak punya akses, tendang ke dashboard dengan pesan error
            return redirect()->route('dashboard')->with('error', 'Access denied, you do not have a permission');
        }

        return $next($request);
    }
}

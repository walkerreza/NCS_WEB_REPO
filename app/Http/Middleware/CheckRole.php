<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     * Middleware untuk memeriksa role user (admin/guest)
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role  Role yang dibutuhkan untuk mengakses route
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Cek apakah user sudah login
        if (! auth()->check()) {
            // Jika request dari API, return JSON
            if ($request->expectsJson()) {
                return response()->json([
                    'sukses' => false,
                    'pesan' => 'Anda harus login terlebih dahulu',
                ], 401);
            }
            
            // Jika request dari web, redirect ke login
            return redirect()->route('login')->withErrors([
                'email' => 'Please login to access this page.',
            ]);
        }

        // Cek apakah role user sesuai
        if (auth()->user()->role !== $role) {
            // Jika request dari API, return JSON
            if ($request->expectsJson()) {
                return response()->json([
                    'sukses' => false,
                    'pesan' => 'Anda tidak memiliki akses ke halaman ini',
                ], 403);
            }
            
            // Jika request dari web, redirect dengan error
            auth()->logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Access denied. You do not have permission to access this page.',
            ]);
        }

        return $next($request);
    }
}

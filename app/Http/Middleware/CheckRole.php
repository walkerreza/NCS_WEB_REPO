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
        if (!auth()->check()) {
            return response()->json([
                'sukses' => false,
                'pesan' => 'Anda harus login terlebih dahulu',
            ], 401);
        }

        // Cek apakah role user sesuai
        if (auth()->user()->role !== $role) {
            return response()->json([
                'sukses' => false,
                'pesan' => 'Anda tidak memiliki akses ke halaman ini',
            ], 403);
        }

        return $next($request);
    }
}

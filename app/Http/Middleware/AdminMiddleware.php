<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // kalau bukan admin, logout lalu arahkan ke login dengan pesan error
        auth()->logout();
        return redirect()->route('login')->withErrors(['access' => 'Akun ini tidak memiliki akses ke dashboard admin.']);
    }
}

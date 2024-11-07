<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Usuário não autenticado
            return redirect('login');
        }

        $user = Auth::user();
        if ($user->hasRole('admin') || $user->hasRole('cliente')) {
            return $next($request);
        }
        return redirect('/');
    }
}
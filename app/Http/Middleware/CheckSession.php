<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {  
        if (Auth::check()) {
            $user = Auth::user();

            // Se o session_id não corresponder, deslogar o usuário
            if ($user->session_id !== Session::getId()) {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'error' => 'Sua conta foi acessada em outro dispositivo. Você foi desconectado.'
                ]);
            }
        }
        return $next($request);
    }
}

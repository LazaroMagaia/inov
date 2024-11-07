<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException; 
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();
        } catch (ValidationException $e) {
            // Altere a mensagem de erro
            throw ValidationException::withMessages([
                'email' => 'As credenciais fornecidas não são válidas. Tente novamente.',
            ]);
        }
        $request->session()->regenerate();

        // Verificar o papel do usuário
        $user = Auth::user();
        $user->session_id = Session::getId();
        $user->save();

        // Redirecionar baseado no papel
        if ($user->hasRole('admin')) {
            return redirect()->intended(route('admin.index', absolute: false));
        } elseif ($user->hasRole('cliente')) {
            return redirect()->intended(route('client.index', absolute: false));
        }

        // Redirecionar para uma página padrão se o papel não for reconhecido
        return redirect()->intended(route('home', absolute: false));
        }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

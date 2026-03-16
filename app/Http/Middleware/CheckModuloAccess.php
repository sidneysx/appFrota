<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;

class CheckModuloAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request):
     */
    public function handle($request, Closure $next, string $modulo)
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Admin acessa tudo
        if ($user->role === 'user_admin') {
            return $next($request);
        }

        // Liberação baseada no tipo do usuário
        if ($user->role === 'user_multas' && $modulo === 'multas') {
            return $next($request);
        }

        if ($user->role === 'user_controle' && $modulo === 'manutencao') {
            return $next($request);
        }

        // Caso não tenha permissão
        // criar formulario para solcitar acesso
        return redirect()->route('solicitar-acesso');
    }
}

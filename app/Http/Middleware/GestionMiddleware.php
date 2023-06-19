<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class GestionMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        //Comprobar si el usuario está autenticado
        if (Auth::check()) {
            // Obtener el usuario autenticado
            $usuario = Auth::user();
    
            //Verificar el tipo de usuario
            if ($usuario->tipousuario == 1) {
                return $next($request);//El tipo de usuario es válido y accede a la ruta
            }
        }

        return back();
    }
}

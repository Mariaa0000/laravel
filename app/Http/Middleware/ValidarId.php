<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidarId
{
    /**
     * Manejar una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // Obtener el id de la ruta
        $id = $request->route('id');

        // ID numérico y positivo
        if (!is_numeric($id) || $id <= 0) {
            // Retornar un error 400 Bad Request con mensaje
            return response()->json(['error' => 'El ID debe ser un número entero positivo'], Response::HTTP_BAD_REQUEST);
        }

        // Continuar con la solicitud si pasa la validación
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidarIdRutas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('id');

        // VALIDAR ID POSITIVO Y ENTERO
        if (!is_numeric($id) || intval($id) != $id || intval($id) <= 0) {
            return response()->json(['error' => 'El ID debe ser un número entero positivo.'], 400);
        }

        return $next($request);
    }
}

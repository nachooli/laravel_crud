<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

/**
 * Controller abstracto base
 */
abstract class Controller
{
    /**
     * Respuesta exitosa estandarizada.
     * Se podría establecer mensajes y códigos devueltos por defecto.
     */
    protected function success(mixed $data, int $code = 200): JsonResponse
    {
        return response()->json($data, $code);
    }
}

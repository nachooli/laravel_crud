<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/**
 * Rutas para el CRUD.
 * Se versiona (v1) por buenas prácticas, aunque en realidad no haría falta al tratarse de una prueba.
 */
Route::prefix('v1')
    ->middleware('api')
    ->name('api.v1.')
    ->group(function () {
        Route::apiResource('categories', CategoryController::class);
    });

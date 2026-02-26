<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostRecordsController;
use Illuminate\Support\Facades\Route;

/**
 * Rutas para el CRUD.
 * Se versiona (v1) por buenas prácticas, aunque en realidad no haría falta al tratarse de una prueba.
 */
Route::prefix('v1')
    ->middleware('api')
    ->name('api.v1.')
    ->group(function () {
        // Rutas para el CRUD de Category
        Route::apiResource('categories', CategoryController::class);

        // Ruta para los registros de los posts
        Route::get(
            'posts/{post}/records',
            [PostRecordsController::class, 'show']
        )->name('posts.records');
    });

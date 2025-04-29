<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;

Route::get('/alumnos', [AlumnoController::class, 'index']->name('alumnos.index'));
Route::post('/alumnos', [AlumnoController::class, 'store']->name('alumnos.post'));
Route::middleware('validar.id')->group(function () {
    Route::get('/alumnos/{id}', [AlumnoController::class, 'show']);
    Route::put('/alumnos/{id}', [AlumnoController::class, 'update']);
    Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy']);
});

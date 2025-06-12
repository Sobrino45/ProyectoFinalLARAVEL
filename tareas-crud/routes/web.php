<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta resource para CRUD completo de tareas
Route::resource('tareas', TareaController::class);

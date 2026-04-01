<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TareaController; // Asegúrate de que este sea el nombre de tu controlador
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirigir la raíz (/) directamente a la lista de tareas
// Si no están logueados, el middleware 'auth' de la ruta destino los enviará al Login
Route::get('/', function () {
    return redirect()->route('tareas.index');
});

// Usamos tu lista de tareas como el nuevo "Dashboard"
Route::get('/dashboard', [TareaController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Todas las rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    
    // Rutas de Perfil (Generadas por Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tus rutas de Tareas (CRUD completo)
    Route::resource('tareas', TareaController::class);
});

require __DIR__.'/auth.php';
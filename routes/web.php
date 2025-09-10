<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\ProfileController;

// ------------------------
// Landing page
// ------------------------
Route::get('/', function () { 
    return view('welcome'); 
});

// ------------------------
// Rutas de autenticación
// ------------------------
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store');
    Route::post('/logout', 'logout')->name('logout');
});

// ------------------------
// Redirección después del login
// ------------------------
Route::get('/home', function () {
    return redirect()->route('dashboard');
})->name('home');

// ------------------------
// Rutas protegidas (requieren login)
// ------------------------
Route::middleware('auth')->group(function() {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD completo de Estudiantes
    Route::resource('estudiantes', EstudianteController::class);

    // CRUD completo de Informes
    Route::resource('informes', InformeController::class);

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
});

// ------------------------
// Ruta 404 personalizada
// ------------------------
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

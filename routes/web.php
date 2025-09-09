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
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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
});

<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

Route::middleware('auth')->group(function () {

    // Rotas de Categorias
    Route::get('categories', [CategoriesController::class, 'index']);
    Route::get('categories/create', [CategoriesController::class, 'create']);
    Route::post('categories', [CategoriesController::class, 'store']);
    Route::get('categories/{id}/edit', [CategoriesController::class, 'edit']);
    Route::put('categories/{id}', [CategoriesController::class, 'update']);
    Route::delete('categories/{id}', [CategoriesController::class, 'destroy']);
});


require __DIR__ . '/auth.php';

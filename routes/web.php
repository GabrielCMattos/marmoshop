<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\InsumosController;
use App\Http\Controllers\UnitsController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

Route::middleware('auth')->group(function () {

    //Rota para selecionar a categoria que deseja cadastrar
    Route::view('/cadastro', 'admin.cadastro')->name('cadastro');

    // Rotas de Categorias
    Route::get('categories', [CategoriesController::class, 'index']);
    Route::get('categories/create', [CategoriesController::class, 'create'])->name('createcategory');
    Route::post('categories', [CategoriesController::class, 'store']);
    Route::get('categories/{id}/edit', [CategoriesController::class, 'edit']);
    Route::put('categories/{id}', [CategoriesController::class, 'update']);
    Route::delete('categories/{id}', [CategoriesController::class, 'destroy']);

    // Rotas de Brands
    Route::get('brands', [BrandsController::class, 'index']);
    Route::get('brands/create', [BrandsController::class, 'create'])->name('createbrand');
    Route::post('brands', [BrandsController::class, 'store']);
    Route::get('brands/{id}/edit', [BrandsController::class, 'edit']);
    Route::put('brands/{id}', [BrandsController::class, 'update']);
    Route::delete('brands/{id}', [BrandsController::class, 'destroy']);

    // Rotas de Units
    Route::get('units', [UnitsController::class, 'index']);
    Route::get('units/create', [UnitsController::class, 'create']);
    Route::post('units', [UnitsController::class, 'store']);
    Route::get('units/{id}/edit', [UnitsController::class, 'edit']);
    Route::put('units/{id}', [UnitsController::class, 'update']);
    Route::delete('units/{id}', [UnitsController::class, 'destroy']);

    //Rotas de Insumos
    Route::get('insumos', [InsumosController::class, 'index']);
    Route::get('insumos/create', [InsumosController::class, 'create'])->name('createinsumo');
    Route::post('insumos', [InsumosController::class, 'store'])->name('insumos.store');
    Route::get('insumos/{id}/edit', [InsumosController::class, 'edit']);
    Route::put('insumos/{id}', [InsumosController::class, 'update']);
    Route::delete('insumos/{id}', [InsumosController::class, 'destroy']);
});


require __DIR__ . '/auth.php';

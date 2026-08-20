<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;


// Ladding page
Route::get('/', HomeController::class);

Route::prefix('products')->controller(ProductsController::class)->group(function () {

    // Mostrar todos los productos
    Route::get('/', 'index');

    // Mostrar el formulario para crear un nuevo producto
    Route::get('/create', 'create');

    // Mostrar un producto específico por su ID
    Route::get('/{id}', 'show');
});

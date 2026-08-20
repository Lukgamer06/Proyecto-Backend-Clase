<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;


    // Ladding page
Route::get('/', HomeController::class );

    // Mostrar todos los productos
Route::get('/products', [ProductsController::class , 'index' ] );

    // Mostrar el formulario para crear un nuevo producto
Route::get('/products/create', [ProductsController::class , 'create' ] );

    // Mostrar un producto específico por su ID
Route::get('/products/{id}', [ProductsController::class, 'show']);
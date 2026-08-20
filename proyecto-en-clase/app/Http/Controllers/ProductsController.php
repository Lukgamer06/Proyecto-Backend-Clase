<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        // Lógica para mostrar todos los productos
        return "Mostrar productos";
        //return view('products.index');
    }

    public function create()
    {
        // Lógica para mostrar el formulario de creación de productos
        return "Crear productos";
        //return view('products.create');
    }

    public function show($id)
    {
        // Lógica para mostrar un producto específico
        return "Mostrar productos: $id";
        //return view('products.show');
    }
}

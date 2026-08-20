<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductsController extends Controller
{
    // GET /products
    public function index()
    {
        $products = Product::latest()->paginate(12);
        return view('products.index', compact('products'));
    }

    // GET /products/create
    public function create()
    {
        return view('products.create');
    }

    // POST /products
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'image_url' => 'nullable|url',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($data);

        return redirect('/products')->with('success', 'Producto creado correctamente');
    }

    // GET /products/{id}
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}

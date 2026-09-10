<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class ProductsController extends Controller
{
    // GET /products
    public function index(Request $request)
    {
        $perPage = min(max((int) $request->integer('per_page', 12), 6), 48);

        $products = Product::query()
            ->with('category')
            ->when($request->filled('q'), function ($query) use ($request) {
                $term = $request->string('q')->trim();
                $query->where(function ($query) use ($term) {
                    $query->where('name', 'like', "%{$term}%")
                        ->orWhere('description', 'like', "%{$term}%");
                });
            })
            ->when($request->filled('category_id'), function ($query) use ($request) {
                $query->where('category_id', $request->integer('category_id'));
            })
            ->when($request->input('stock') === 'low', fn ($query) => $query->whereBetween('stock', [1, 5]))
            ->when($request->input('stock') === 'out', fn ($query) => $query->where('stock', 0))
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        $categories = Category::query()->orderBy('name')->get(['id', 'name']);

        return view('products.index', compact('products', 'categories'));
    }

    // GET /products/create
    public function create()
    {
        return view('products.create', ['categories' => Category::orderBy('name')->get()]);
    }

    // POST /products
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
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

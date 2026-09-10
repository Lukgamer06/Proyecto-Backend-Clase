@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="products-container">

    <div class="products-hero">
        <div>
            <p class="eyebrow">Catálogo / Inventario</p>
            <h1>Productos</h1>
            <p class="products-count">{{ number_format($products->total()) }} {{ $products->total() == 1 ? 'producto' : 'productos' }} en el catálogo</p>
        </div>
        <a href="/products/create" class="btn-create"><span aria-hidden="true">+</span> Nuevo producto</a>
    </div>

    <form method="GET" action="/products" class="catalog-toolbar">
        <label class="search-field">
            <span aria-hidden="true">⌕</span>
            <input type="search" name="q" value="{{ request('q') }}" placeholder="Buscar por nombre o descripción..." aria-label="Buscar productos">
        </label>
        <select name="category_id" aria-label="Filtrar por categoría">
            <option value="">Todas las categorías</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected((string) request('category_id') === (string) $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
        <select name="stock" aria-label="Filtrar por stock">
            <option value="">Cualquier stock</option>
            <option value="low" @selected(request('stock') === 'low')>Stock bajo</option>
            <option value="out" @selected(request('stock') === 'out')>Agotados</option>
        </select>
        <select name="per_page" aria-label="Productos por página">
            @foreach ([12, 24, 48] as $size)
                <option value="{{ $size }}" @selected((int) request('per_page', 12) === $size)>{{ $size }} por página</option>
            @endforeach
        </select>
        <button type="submit" class="btn-filter">Filtrar</button>
        @if (request()->hasAny(['q', 'category_id', 'stock']))
            <a href="/products" class="clear-filters">Limpiar</a>
        @endif
    </form>

    @if ($products->count())
        <div class="catalog-meta">
            <span>Mostrando {{ $products->firstItem() }}-{{ $products->lastItem() }} de {{ number_format($products->total()) }}</span>
            <span class="catalog-meta-note">Actualizado recientemente</span>
        </div>

        <div class="grid">
            @foreach ($products as $product)
                <div class="card">
                    <div class="card-image">
                        @if($product->image_url)
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                        @else
                            <div class="card-image-placeholder">Sin imagen</div>
                        @endif
                    </div>

                    <div class="card-category">{{ $product->category?->name ?? 'Sin categoría' }}</div>
                    <h3>{{ $product->name }}</h3>
                    <p class="price">${{ number_format($product->price, 2) }}</p>
                    <p class="stock-line {{ $product->stock > 0 ? ($product->stock <= 5 ? 'stock-low' : 'stock-ok') : 'stock-out' }}">
                        <span></span>{{ $product->stock > 0 ? $product->stock . ' disponibles' : 'Agotado' }}
                    </p>

                    <a href="/products/{{ $product->id }}" class="btn-view">Ver detalles</a>
                </div>
            @endforeach
        </div>

        <div class="pagination-wrap">
            {{ $products->links() }}
        </div>
    @else
        <div class="empty-state">
            <h3>No encontramos productos</h3>
            <p>Prueba a cambiar los filtros o crea un producto nuevo.</p>
            <a href="/products/create" class="btn-create">Crear producto</a>
        </div>
    @endif

</div>
@endsection
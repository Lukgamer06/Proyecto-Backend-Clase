@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="products-container">

    <div class="products-header">
        <div>
            <h2>Listado de productos</h2>
            <p class="products-count">{{ $products->total() }} {{ $products->total() == 1 ? 'producto' : 'productos' }}</p>
        </div>
        <a href="/products/create" class="btn-create">+ Crear nuevo producto</a>
    </div>

    @if ($products->count())
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

                    <h3>{{ $product->name }}</h3>
                    <p class="price">${{ number_format($product->price, 2) }}</p>

                    <a href="/products/{{ $product->id }}" class="btn-view">Ver detalles</a>
                </div>
            @endforeach
        </div>

        <div class="pagination-wrap">
            {{ $products->links() }}
        </div>
    @else
        <div class="empty-state">
            <h3>Todavía no hay productos</h3>
            <p>Crea el primero para que aparezca en este listado.</p>
            <a href="/products/create" class="btn-create">Crear producto</a>
        </div>
    @endif

</div>
@endsection
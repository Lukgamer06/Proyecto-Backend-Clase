@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="product-page">

    <a href="/products" class="btn-back-link">&larr; Volver al listado</a>

    <div class="product">

        <div class="image">
            @if($product->image_url)
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
            @else
                <div class="card-image-placeholder card-image-placeholder-lg">Sin imagen</div>
            @endif
        </div>

        <div class="info">
            @if($product->category)
                <p class="category">{{ $product->category }}</p>
            @endif

            <h2>{{ $product->name }}</h2>

            @if($product->description)
                <p class="description">{{ $product->description }}</p>
            @endif

            <p class="price">${{ number_format($product->price, 2) }}</p>

            <p class="stock {{ $product->stock > 0 ? 'stock-available' : 'stock-empty' }}">
                {{ $product->stock > 0 ? $product->stock . ' unidades disponibles' : 'Sin stock disponible' }}
            </p>

            <a href="/products" class="btn-back">Volver al listado</a>
        </div>

    </div>

</div>
@endsection
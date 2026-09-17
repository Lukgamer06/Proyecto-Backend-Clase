@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="product-page">

    <a href="{{ route('products.index') }}" class="btn-back-link">&larr; Volver al listado</a>

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
                <p class="category">{{ $product->category->name }}</p>
            @endif

            <h2>{{ $product->name }}</h2>

            @if($product->description)
                <p class="description">{{ $product->description }}</p>
            @endif

            <p class="price">${{ number_format($product->price, 2) }}</p>

            <p class="stock {{ $product->stock > 0 ? 'stock-available' : 'stock-empty' }}">
                {{ $product->stock > 0 ? $product->stock . ' unidades disponibles' : 'Sin stock disponible' }}
            </p>

            <p>Creado: {{ $product->created_at?->format('d/m/Y H:i') }}</p>
            <p>Última actualización: {{ $product->updated_at?->format('d/m/Y H:i') }}</p>

            <a href="{{ route('products.edit', $product) }}" class="btn-back">Editar producto</a>
            <a href="{{ route('products.index') }}" class="btn-back">Volver al listado</a>
        </div>

    </div>

</div>
@endsection
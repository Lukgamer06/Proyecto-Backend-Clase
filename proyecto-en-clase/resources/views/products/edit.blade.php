@extends('layouts.app')

@section('title', 'Editar producto')

@section('content')
<div class="form-container">
    <a href="{{ route('products.index') }}" class="btn-back-link">&larr; Volver al listado</a>

    <h2>Editar producto</h2>
    <p class="form-subtitle">Actualiza los datos del producto.</p>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="field">
            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" value="{{ old('name', $product->name) }}" required>
            @error('name') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="field">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" required>{{ old('description', $product->description) }}</textarea>
            @error('description') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="field">
            <label for="category_id">Categoría</label>
            <select id="category_id" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="field">
            <label for="price">Precio</label>
            <input id="price" type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" required>
            @error('price') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <button class="btn-save">Actualizar producto</button>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Crear producto')

@section('content')
<div class="form-container">

    <a href="/products" class="btn-back-link">&larr; Volver al listado</a>

    <h2>Crear producto</h2>
    <p class="form-subtitle">Completa los datos del nuevo producto.</p>

    <form action="/products" method="POST">
        @csrf

        <div class="field">
            <label>Nombre</label>
            <input type="text" name="name" placeholder="Ej. Zapatillas running">
        </div>

        <div class="field">
            <label>Descripción</label>
            <textarea name="description" placeholder="Describe el producto brevemente"></textarea>
        </div>

        <div class="field-row">
            <div class="field">
                <label>Categoría</label>
                <input type="text" name="category" placeholder="Ej. Calzado">
            </div>

            <div class="field">
                <label>URL de imagen</label>
                <input type="url" name="image_url" placeholder="https://...">
            </div>
        </div>

        <div class="field-row">
            <div class="field">
                <label>Precio</label>
                <input type="number" step="0.01" name="price" placeholder="0.00">
            </div>

            <div class="field">
                <label>Stock</label>
                <input type="number" name="stock" placeholder="0">
            </div>
        </div>

        <button class="btn-save">Guardar producto</button>
    </form>

</div>
@endsection
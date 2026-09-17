@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="products-container">
    <div class="products-header">
        <div>
            <h1>Productos</h1>
            <p class="products-count">{{ $products->total() }} producto(s) registrados</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn-create">Nuevo producto</a>
    </div>

    <div class="table-container">
        <table class="products-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category?->name ?? 'Sin categoría' }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td class="table-actions">
                            <a href="{{ route('products.show', $product) }}">Ver</a>
                            <a href="{{ route('products.edit', $product) }}">Editar</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No hay productos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrap">{{ $products->links() }}</div>

</div>
@endsection
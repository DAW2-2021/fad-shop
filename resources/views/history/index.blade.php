@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <div class="container">
        <div class="p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Historial de Productos</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="profile-head">
                    <div class="row">
                        <div class="col-md-11">
                            <h5>
                                Todos los productos: </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Creador/Modificador</th>
                        <th scope="col">Tienda</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Acción</th>
                        <th scope="col">Fecha modificación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prod_history as $product)
                        <tr>
                            <td>{{ $product->email }}</td>
                            <td>{{ $product->shop }}</td>
                            <td>{{ $product->name }}</td>
                            @if (Str::length($product->description) <= 20)
                                <td>{{ $product->description }}</td>
                            @else
                                <td>{{ Str::substr($product->description, 0, 20) . '...' }}</td>
                            @endif
                            <td>{{ $product->price }}€</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->action }}</td>
                            <td>{{ $product->created_at }}</td>
                            @if ($product->created_at != $product->updated_at)
                                <td>{{ $product->updated_at }}</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row d-flex justify-content-center paginator">{{ $prod_history->links() }}</div>
    </div>
@endsection
@section('extraFooter')

@endsection

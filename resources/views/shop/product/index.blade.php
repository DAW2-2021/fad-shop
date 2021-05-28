@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <div class="container">
        <div class="p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Productos</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="profile-head">
                    <div class="row">
                        <div class="col-md-11">
                            <h5>
                                Todos los productos: </h5>
                        </div>
                        <div class="col-md-1">
                            <a href="{{ route('shop.product.create', Auth::user()->shop->slug) }}">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#profileModal">
                                    Añadir
                                </button></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nº Prod.</th>
                        <th scope="col">Creador/Modificador</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Stock</th>
                        {{-- <th scope="col">Categorías</th> --}}
                        <th scope="col">Fecha creación</th>
                        <th scope="col">Fecha modificación</th>
                        <th scope="col">Eliminar</th>
                        <th class="text-center" scope="col">Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->user->username }}</td>
                            <td>{{ $product->name }}</td>
                            @if (Str::length($product->description) <= 20)
                                <td>{{ $product->description }}</td>
                            @else
                                <td>{{ Str::substr($product->description, 0, 20) . '...' }}</td>
                            @endif
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            {{-- <td>{{ $product->categories }}</td> --}}
                            <td>{{ $product->created_at }}</td>
                            @if ($product->created_at != $product->updated_at)
                                <td>{{ $product->updated_at }}</td>
                            @else
                                <td>&nbsp;</td>
                            @endif
                            <td class="text-center">
                                <form method="post"
                                    action="{{ route('shop.product.delete', [$shop->slug, $product->slug]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn"> <i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                            <td class="text-center"><a class="btn"
                                    href="{{ route('shop.product.show', [$shop->slug, $product->slug]) }}"><i
                                        class="far fa-eye"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row d-flex justify-content-center paginator">{{ $products->links() }}</div>
    </div>
@endsection
@section('extraFooter')

@endsection
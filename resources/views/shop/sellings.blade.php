@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <div class="container">
        <div class="p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Productos vendidos</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="profile-head">
                    <div class="row">
                        <div class="col-md-11">
                            <h5>
                                Todos los productos vendidos: </h5>
                        </div>
                        {{--  <div class="col-md-1">
                            <a href="{{ route('shop.product.create', Auth::user()->shop->slug) }}">
                                <button type="button" class="btn btn-primary">
                                    Añadir
                                </button></a>

                        </div>  --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Comprador</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad comprada</th>
                        <th scope="col">Fecha de compra</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->name }}</td>
                            @if (Str::length($order->descrip) <= 20)
                                <td>{{ $order->descrip }}</td>
                            @else
                                <td>{{ Str::substr($order->descrip, 0, 20) . '...' }}</td>
                            @endif
                            <td>{{ $order->price }}€</td>
                            <td>{{ $order->quantity }} u</td>
                            <td>{{ $order->comprado }}</td>
                            {{--@if ($product->created_at != $product->updated_at)
                                <td>{{ $product->updated_at }}</td>
                              <td class="text-center">
                                <a class="btn" href="{{ route('shop.product.show', [$shop->slug, $product->slug]) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>  --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row d-flex justify-content-center paginator">{{ $orders->links() }}</div>
    </div>
@endsection
@section('extraFooter')

@endsection

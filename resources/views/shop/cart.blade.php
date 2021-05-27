@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <!-- CART -->
    <div class="container-fluid">
        <div class="col-md text-center p-4">
            <p class="h3">Order Details</p>
        </div>
        <div class="row">
            <aside class="col-lg-9">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-borderless table-shopping-cart">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col">Producto</th>
                                    <th scope="col" width="120">
                                        Cantidad
                                    </th>
                                    <th scope="col" width="120">Precio</th>
                                    <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr id="product-{{ $product->id }}">
                                        <td>
                                            <figure class="itemside align-items-center">
                                                <figcaption class="info">
                                                    <a href="{{ route('shop.product.index', [$product->shop->slug, $product->slug]) }}"
                                                        class="title text-dark" data-abc="true">{{ $product->name }}</a>
                                                    <p class="text-muted small">
                                                        TIENDA: <a
                                                            href="{{ route('shop.index', $product->shop->slug) }}">{{ $product->shop->name }}
                                                        </a><br />
                                                        STOCK ACTUAL: {{ $product->stock }}
                                                    </p>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control product-quantity" min="1"
                                                max="{{ $product->stock }}" name="" id=""
                                                data-productId="{{ $product->id }}" @if ($product->stock == 0) disabled value="0"
                                                @else
            value="1" @endif>
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price"> <span class="product-price"
                                                        id="product-price-{{ $product->id }}">{{ $product->price }}</span>
                                                    €</var><br>
                                                <small class="text-muted">
                                                    {{ $product->price }} € por unidad
                                                </small>
                                            </div>
                                        </td>
                                        <td class="text-right d-none d-md-block">
                                            <button class="btn btn-danger remove-product"
                                                data-productId="{{ $product->id }}">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </aside>
            <!-- aside derecha -->
            <aside class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Precio Total:</dt>
                            <dd class="text-right ml-3"> <span id="total-price"></span> €</dd>
                        </dl>
                        <hr />
                        <a @if (Auth::guest()) href="#" data-bs-target="#loginModal" data-bs-toggle="modal" data-bs-dismiss="modal" @endif href="#enlacePasarela" class="btn btn-out btn-primary btn-square btn-main"
                            data-abc="true">
                            Tramitar Pedido
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection
@section('extraFooter')
    <script>
        $(document).ready(function() {
            // .product-price El precio total de todos foreach
            // #total-price el precio total de tdo
            $(".remove-product").on("click", e => {
                productId = e.target.getAttribute("data-productId");
                $("#product-" + productId).remove();
                removeProductCart(productId);
            });

        });

    </script>
@endsection

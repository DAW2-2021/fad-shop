@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <!-- CART -->
    <div class="container-fluid">
        <div class="col-md text-center p-4">
            <p class="h3">Detalles del Carrito</p>
        </div>
        @if ($errors->any())
            <div class="col-md text-center alert alert-danger">
                {!! implode('', $errors->all(':message')) !!}
            </div>
        @endif

        <form action="{{ route('payment.success') }}" id="formCart" class="row" method="post">
            @csrf
            @method('POST')
            <!-- DETALLES CARRITO -->
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
                                                    <a href="{{ route('shop.product.show', [$product->shop->slug, $product->slug]) }}"
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
                                            <input type="hidden" name="id[]" value="{{ $product->id }}">
                                            <input type="number" class="form-control product-quantity" min="1"
                                                max="{{ $product->stock }}" name="quantity[]"
                                                data-productPrice="{{ $product->price }}"
                                                data-productId="{{ $product->id }}" @if ($product->stock == 0) disabled value="0"
                                                @else
                                                                                        value="1" @endif>
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price"> <span class="product-price"
                                                        data-productPrice="{{ $product->price }}"
                                                        data-unityPrice="{{ $product->price }}"
                                                        data-name="{{ $product->name }}"
                                                        data-shop="{{ $product->shop->name }}" data-quantity=""
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
            <!-- PRECIO TOTAL -->
            <aside class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Precio Total:</dt>
                            <dd class="text-right ml-3"> <span id="total-price"></span> €</dd>
                        </dl>
                        <hr />
                        @if (Auth::check())
                            <div id="smart-button-container">
                                <div style="text-align: center;">
                                    <div id="paypal-button-container"></div>
                                </div>
                            </div>
                        @else
                            <a href="#" data-bs-target="#loginModal" data-bs-toggle="modal" data-bs-dismiss="modal"
                                class="btn btn-out btn-primary btn-square btn-main">
                                Iniciar Sesión
                            </a>
                        @endif

                    </div>
                </div>
            </aside>
        </form>
    </div>
@endsection
@section('extraFooter')
    <script
        src="https://www.paypal.com/sdk/js?client-id=AT0Hpfk0QGek7NzXuqU9hXRtuYJk0YtwRx1oRB0FA1LswjPdxpRatlYb9rV3yS-JsNZhgfh-iIKnUUva&currency=EUR"
        data-sdk-integration-source="button-factory">
    </script>
    <script>
        $(document).ready(function() {
            // PAYPAL
            function initPayPalButton() {
                paypal.Buttons({
                    style: {
                        shape: 'pill',
                        color: 'blue',
                        layout: 'vertical',
                        label: 'pay',

                    },

                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                "description": getAllDescriptions(),
                                "amount": {
                                    "currency_code": "EUR",
                                    "value": getTotalPrice()
                                }
                            }]
                        });
                    },

                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
                            $("#formCart").submit();
                        });
                    },

                    onError: function(err) {
                        console.log(err);
                    }
                }).render('#paypal-button-container');
            }
            initPayPalButton();

            //CARRITO
            reloadTotalPrice();

            $(".remove-product").on("click", e => {
                let productId = e.target.getAttribute("data-productId");
                $("#product-" + productId).remove();
                removeProductCart(productId);
                reloadTotalPrice();
            });

            $(".product-quantity").on("change", e => {
                let productId = e.target.getAttribute("data-productId");
                let priceUnity = e.target.getAttribute("data-productPrice");
                let quantity = e.target.value;

                let totalPriceProduct = round2decimals(quantity * priceUnity);
                let productPrice = $("#product-price-" + productId);
                productPrice.html(totalPriceProduct);
                productPrice.attr("data-productPrice", totalPriceProduct);
                productPrice.attr("data-quantity", quantity);
                reloadTotalPrice();
            });


            function getAllDescriptions() {
                let result = "";
                let totalPrice;
                let unityPrice;
                let quantity;
                let product;
                let shop;

                $(".product-price").each(function() {
                    totalPrice = $(this).attr("data-productPrice");
                    unityPrice = $(this).attr("data-unityPrice");
                    product = $(this).attr("data-name");
                    shop = $(this).attr("data-shop");
                    quantity = $(this).attr("data-quantity");
                    result += product + "(" + shop + ") " + quantity + "x " + totalPrice + "€ " +
                        unityPrice + "€/u || ";
                    "Producto(tienda) 4x 251.21€ 12€/u"
                });
                return result.substring(0, result.length - 3);
            }

            function getTotalPrice() {
                let totalPrice = 0;
                $(".product-price").each(function() {
                    totalPrice += parseFloat($(this).attr("data-productPrice"));
                });
                return round2decimals(totalPrice);
            }

            function reloadTotalPrice() {
                $("#total-price").html(getTotalPrice());
            }
        });

    </script>
@endsection

@extends('layouts.app')
@section('extraHeader')

@endsection

@section('content')
    <div id="smart-button-container">
        <div style="text-align: center;">
            <div id="paypal-button-container"></div>
        </div>
    </div>
    <script
        src="https://www.paypal.com/sdk/js?client-id=AT0Hpfk0QGek7NzXuqU9hXRtuYJk0YtwRx1oRB0FA1LswjPdxpRatlYb9rV3yS-JsNZhgfh-iIKnUUva&currency=EUR"
        data-sdk-integration-source="button-factory">
    </script>
    <script>
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
                            "description": "Mi producto favorito", //cambiar
                            "amount": {
                                "currency_code": "EUR",
                                "value": 1 //cambiar
                            }
                        }]
                    });
                },

                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        //cambiar por route redirect
                        alert('Transaction completed by ' + details.payer.name.given_name + '!');
                    });
                },

                onError: function(err) {
                    console.log(err);
                }
            }).render('#paypal-button-container');
        }
        initPayPalButton();

    </script>
@endsection
@section('extraFooter')

@endsection

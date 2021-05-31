<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Mail\MailSender;

class PaymentController extends Controller
{
    public function success(Request $request)
    {
        if (Auth::guest()) {
            return redirect()->route('cart');
        }

        $validator = Validator::make($request->all(), [
            'id' => ['required', 'array', 'min:1'],
            'quantity' => ['required', 'array', 'min:1'],
            //check value array
            'id.*' => ['integer', 'min:1'],
            'quantity.*' => ['integer', 'min:1'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('cart')->withErrors($validator);
        }

        $order = Auth::user()->orders()->create();
        //BODY DEL EMAIL
        $bodyEmail = '<h3>Detalles de Compra:</h3>
        <table style="border-collapse: collapse;">
                <caption><strong>Pedido nº :NUMERO_PEDIDO_ORDER</strong></caption>
            <tr>
                <th style="border: 1px solid #dddddd;padding:8px;">Producto</th>
                <th style="border: 1px solid #dddddd;padding:8px;">Tienda</th>
                <th style="border: 1px solid #dddddd;padding:8px;">Cantidad</th>
                <th style="border: 1px solid #dddddd;padding:8px;">Precio Unidad</th>
                <th style="border: 1px solid #dddddd;padding:8px;">Precio Total</th>
            </tr>';
        $errorMessage = '';
        $productCookie = htmlspecialchars($_COOKIE['cart-data']);

        for ($i = 0; $i < count($request->id); $i++) {
            $product = Product::find($request->id[$i]);

            $stock = $product->stock;
            $quantityForm = $request->quantity[$i];

            if ($product->shop->blocked_at) {
                $errorMessage .= '<p>No se ha podido comprar el producto <strong>' . $product->name . '</strong> porque <strong>la tienda ' . $product->shop->name . ' esta bloqueada</strong></p>';
            } else if ($stock < $quantityForm) {
                $quantity = $stock - $quantityForm;
                $quantityForm = $quantity + $quantityForm;
                $stock = 0;
                //Generar body email
                if ($quantityForm) {
                    $errorMessage .= '<p>El producto <strong>' . $product->name . '</strong> de la tiena <strong>' . $product->shop->name . '</strong>, solo se ha podido comprar <strong>' . $quantityForm . '</strong>.</p>';
                } else {
                    $errorMessage .= '<p>El producto <strong>' . $product->name . '</strong> de la tiena <strong>' . $product->shop->name . '</strong>, no se ha podido comprar ninguno, no queda stock.</p>';
                }
            } else {
                $stock = $stock - $quantityForm;
            }

            //Mirar si ha podido comprar alguno
            if ($quantityForm > 0) {
                $product->stock = $stock;
                $product->save();
                $order->products()->attach(
                    $product,
                    [
                        'quantity' => $quantityForm,
                        'price' => $product->price
                    ]
                );
                $bodyEmail .= '<tr>
                                    <td  style="border: 1px solid #dddddd;padding:8px;">' . $product->name . '</td>
                                    <td  style="border: 1px solid #dddddd;padding:8px;">' . $product->shop->name . '</td>
                                    <td  style="border: 1px solid #dddddd;padding:8px;">' . $quantityForm . '</td>
                                    <td  style="border: 1px solid #dddddd;padding:8px;">' . $product->price . '€</td>
                                    <td  style="border: 1px solid #dddddd;padding:8px;">' . $quantityForm * $product->price . '€</td>
                                </tr>';
                //Quitar de la cookie el producto si se ha comprado
                $productCookie = str_replace('|' . $product->id . '|', '|', $productCookie);
            }
        }
        setcookie('cart-data', $productCookie, time() + (86400 * 365), "/");

        //Eliminar el order si no tiene productos
        if (!$order->products()->count()) {
            $order->delete();
            $details = [
                'title' => 'No se ha podido realizar la compra por el/los siguiente/s motivo/s:',
                'body' => $errorMessage,
                'view' => 'emails.generic'
            ];
        } else {
            $bodyEmail .= '     <tr>
                                    <th colspan="5" style="text-align:right">PRECIO TOTAL: ' . $order->products()->withTrashed()->selectRaw('SUM(order_product.quantity * order_product.price) as total')->pluck('total')[0] . '€</th>
                                </tr>
                            </table>';

            if ($errorMessage != '') {
                $errorMessage = '<h3>Error al comprar la cantidad desdeada de los siguientes productos:</h3>' . $errorMessage;
            }

            $details = [
                'title' => 'Compra realizada corractemente',
                'body' => $errorMessage . str_replace(':NUMERO_PEDIDO_ORDER', $order->id, $bodyEmail),
                'view' => 'emails.generic'
            ];
        }

        \Mail::to(Auth::user()->email)->send(new MailSender($details));

        //AÑADIR VISTA CON AUTO REDIRECCION A INDEX A LOS SEGUNDOS
        return redirect()->route('user.index');
    }
}

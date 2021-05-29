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
        $bodyEmail = '';
        for ($i = 0; $i < count($request->id); $i++) {
            $product = Product::find($request->id[$i]);

            $stock = $product->stock;
            $quantityForm = $request->quantity[$i];

            if ($stock < $quantityForm) {
                $stock = 0;
                $quantity = $stock - $quantityForm;
                $quantityForm = $quantity + $quantityForm;
                //Generar body email con br
                $bodyEmail .= '<p>Del producto <strong>' . $product->name . '</strong> solo se ha podido comprar <strong>' . $quantityForm . '</strong>.</p>';
            } else {
                $stock = $stock - $quantityForm;
            }

            $product->stock = $stock;

            $product->save();
            $order->products()->attach(
                $product,
                [
                    'quantity' => $quantityForm,
                    'price' => $product->price
                ]
            );
        }

        if ($bodyEmail != '') {
            $details = [
                'title' => 'No se ha podido comprar la cantidad que desebas de el/los producto/s siguiente/s:',
                'body' => $bodyEmail,
                'view' => 'emails.generic'
            ];
            \Mail::to(Auth::user()->email)->send(new MailSender($details));
            # ENVIAR EMAIL CONFORME NO SE HA PODIDO COMPRAR TODO EL STOCK QUE QUERIA
        }

        //AÑADIR VISTA CON AUTO REDIRECCION A INDEX A LOS SEGUNDOS
        return redirect()->route('payment.success');
    }
}

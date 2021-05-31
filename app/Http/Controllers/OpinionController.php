<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Opinion;
use Illuminate\Support\Facades\Validator;
use App\Models\Shop;
use App\Models\Product;

class OpinionController extends Controller
{
    public function store(Request $request, $shop, $product)
    {
        //Salir si no tiene el producto comprado o si tiene un comentario
        if (
            !$product->orders()->where('user_id', Auth::user()->id)->count() &&
            $product->opinions()->where('user_id', Auth::user()->id)->count() != 0
        ) {
            return redirect()->route('shop.product.show', [$shop->slug, $product->slug]);
        }

        //user
        $validator = Validator::make($request->all(), [
            'score' => ['required', 'integer', 'min_length:0', 'max_length:10'],
            'comment' => ['nullable', 'string', 'min_length:3', 'max_length:255'],
        ]);

        $shop = Shop::where(['slug' => $shop])->first();
        if ($shop == null) {
            return redirect()->route('shop.settings', $shop->slug)->withInput()->withErrors(['Error' => 'No existe el producto.']);
        }

        if ($validator->fails()) {
            return redirect()->route('opinion.store')->withErrors($validator);
        }

        $product = Product::where(['slug' => $product, 'shop_id' => $shop->id])->first();

        if ($product == null) {

            return redirect()->route('shop.settings', $shop->slug)->withInput()->withErrors(['Error' => 'No existe el producto.']);
        }
        Opinion::create(['score' => $request->score, 'comment' => $request->comment, 'product_id' => $request->product_id, 'user_id' => Auth::user()->id]);

        return redirect()->route('shop.product.show', [$shop->slug, $product->slug]);
    }

    public function update(Request $request, $shop, $product, $comment)
    {
        $opinion = Opinion::where('id', $comment)->firstOrFail();
        //user
        if (Auth::user()->id == $opinion->user_id) {
            $validator = Validator::make($request->all(), [
                'score' => ['nullable', 'integer', 'min_length:0', 'max_length:10'],
                'comment' => ['nullable', 'string', 'min_length:3', 'max_length:255'],
            ]);
            $shop = Shop::where(['slug' => $shop])->first();
            if ($shop == null) {
                return redirect()->route('shop.product.show', [$shop->slug, $product->slug])->withInput()->withErrors(['Error' => 'No existe el producto.']);
            }

            if ($validator->fails()) {
                return redirect()->route('shop.product.show', [$shop->slug, $product->slug])->withErrors($validator);
            }

            $product = Product::where(['slug' => $product, 'shop_id' => $shop->id])->first();

            if ($product == null) {
                return redirect()->route('shop.product.show', [$shop->slug, $product->slug])->withInput()->withErrors(['Error' => 'No existe el producto.']);
            }
            $opinion->update($request->all());
            return redirect()->route('shop.product.show', [$shop->slug, $product->slug]);
        }
    }

    public function destroy($shop, $product, Opinion $comment)
    {
        $shop = Shop::where(['slug' => $shop])->first();
        if ($shop == null) {
            return redirect()->route('shop.settings', $shop->slug)->withInput()->withErrors(['Error' => 'No existe la tienda.']);
        }

        $product = Product::where(['slug' => $product, 'shop_id' => $shop->id])->first();

        if ($product == null) {
            return redirect()->route('shop.settings', $shop->slug)->withInput()->withErrors(['Error' => 'No existe el producto.']);
        }

        //user | admin
        if (Auth::user()->id == $comment->user_id || Auth::user()->role_id == 1) {
            $opinion = Opinion::where('id', $comment->id)->firstOrFail();
            $opinion->delete();
            return redirect()->route('shop.product.show', [$shop->slug, $product->slug]);
        }
        return redirect()->route('shop.product.show', [$shop->slug, $product->slug])->withErrors('No tienes permisos para borrar la opinion.');
    }
}

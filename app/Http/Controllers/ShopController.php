<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Product;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //el administrador acepta las peticiones
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //cambiar if si añadimos que puedan verlo los "empleados" del vendedor
        if ($shop->user_id == Auth::user()->id) {
            return view('shop.settings');
        }
        return redirect()->route('index');
    }

    /**
     * Show the specified product in shop.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   array $shop
     * @param   array $request (product)
     * @return  \Illuminate\Http\Response
     */
    public function showProduct(Shop $shop, Product $product)
    {
        if ($product->shop_id == $shop->id) {
            return view('product.index', compact('product'));
        }
        return redirect()->route('index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        if ($shop->user_id == Auth::user()->id) {
            $validator = Validator::make($request->all(), [
                'name' => ['nullable', 'string', 'min:3', 'max:255'],
                'description' => ['nullable', 'string', 'min:3', 'max:255'],
                'logo' => ['nullable', 'mimes:png,jpg,jpeg', 'max:1024'],
            ]);
            if ($validator->fails()) {
                //Cambiar id por name
                return redirect()->route('shop.settings', $shop->id)->withErrors($validator);
            }
            $shop->update($request->all());
            return redirect()->route('shop.settings', $shop->id);
        }
        return redirect()->route('shop.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        if ($shop->user_id == Auth::user()->id) {
            $shop->delete();
            return redirect()->route('shop.index');
        }
        return redirect()->route('shop.index');
    }
}

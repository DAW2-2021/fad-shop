<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        //
    }

    public function create($shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();
        $user = Auth::user();
        if ($user->id != $shop->user_id) {
            return redirect()->route('shop.index', compact('shop'));
        }
    }

    public function store(Request $request, $shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();
    }

    public function show($shop, $product)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();
        $product = Product::where(['slug' => $product, 'shop_id' => $shop->id])->firstOrFail();
        return view('product.index', compact('product'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

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

    public function store(Request $request, $shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();
    }

    public function show($shop, $product)
    {
        //hay que mirar que pasa si falla
        $shop = Shop::firstOrFail('slug', $shop);
        $product = Product::firstOrFail(['slug' => $product, 'shop_id' => $shop->id]);
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

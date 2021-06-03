<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductHistory;
use App\Models\Shop;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProducHistoryController extends Controller
{
    public function index()
    {
        $prod_history = ProductHistory::leftJoin('users', 'users.id', '=', 'product_histories.user_id')
		    ->leftJoin('shops', 'shops.id', '=', 'product_histories.shop_id')
		    ->orderByDesc('updated_at')
		    ->selectRaw('product_histories.*, users.email AS email, shops.name AS shop')
		    ->paginate(15);
        return view('history.index', compact('prod_history'));
    }

    public function show($shop, $product)
    {

        $shop = Shop::where('slug', $shop)->firstOrFail();

        if (Auth::user()->hasRole('seller') && $shop->user_id != Auth::user()->id) {
            return redirect()->route('index');
        }
        //Comprueba que exista el producto
        $product = Product::where(['slug' => $product, 'shop_id' => $shop->id])->firstOrFail();

        $prod_history = ProductHistory::where(['id' => $product->id, 'shop_id' => $shop->id])->orderByDesc('updated_at')->paginate(15);
        return view('history.show', compact('prod_history', 'product'));
    }
}

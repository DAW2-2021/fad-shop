<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;

class PagesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $shops = Shop::inRandomOrder()->limit(7)->get();
        return view('index', compact('categories', 'shops'));
    }


    public function cart()
    {
        $cart = htmlspecialchars($_COOKIE['cart-data']);
        $cart = trim($cart, '|');
        $cart = explode('|', $cart);
        $products = Product::whereIn('id', $cart)->orderBy('shop_id')->get();
        return view('shop.cart', compact('products'));
    }

    public function searchProduct($name)
    {
        $prods = Product::where('slug', 'like', '%' . $name . '%')->orderBy('name')->paginate(9);
        return view('search.product', compact('prods', 'name'));
    }

    public function searchShopProduct($name, $shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();
        $prods = Product::where('slug', 'like', '%' . $name . '%')->where('shop_id', $shop->id)->orderBy('name')->paginate(9);
        return view('search.shop.product', compact('prods', 'shop', 'name'));
    }
}

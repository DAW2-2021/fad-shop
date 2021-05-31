<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Shop;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        $this->checkIfExistsProducts();

        $week = Carbon::now()->subDays(7);
        $month = Carbon::now()->subDays(30);
        $popularProductsMonth = Product::leftJoin('order_product', 'products.id', '=', 'order_product.product_id')
            ->leftJoin('orders', 'orders.id', '=', 'order_product.order_id')
            ->groupBy('order_product.product_id')
            ->whereDate('orders.created_at', '>', $month)
            ->selectRaw('products.*, COUNT(*) AS total')
            ->orderByDesc('total')
            ->limit(8)
            ->get();

        $popularShopsWeek = Product::leftJoin('order_product', 'products.id', '=', 'order_product.product_id')
            ->leftJoin('orders', 'orders.id', '=', 'order_product.order_id')
            ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
            ->groupBy('products.shop_id')
            ->whereDate('orders.created_at', '>', $week)
            ->selectRaw('shops.*, COUNT(*) AS total')
            ->orderByDesc('total')
            ->limit(3)
            ->get();

        $categories = Category::all();
        $shops = Shop::inRandomOrder()->limit(7)->get();
        return view('index', compact('categories', 'shops', 'popularProductsMonth', 'popularShopsWeek'));
    }


    public function cart()
    {
        if (Auth::check() && Auth::user()->hasAnyRole(['admin', 'seller'])) {
            abort(403, "Non authorized");
        }
        $this->checkIfExistsProducts();
        $products = [];
        if (isset($_COOKIE['cart-data'])) {
            $cart = htmlspecialchars($_COOKIE['cart-data']);
            $cart = trim($cart, '|');
            $cart = explode('|', $cart);
            $products = Product::whereIn('id', $cart)->orderBy('shop_id')->get();
        }
        return view('shop.cart', compact('products'));
    }

    public function searchProduct($name)
    {
        $categories = Category::all();
        $prods = Product::where('slug', 'like', '%' . $name . '%')->orderBy('name')->paginate(9);
        return view('search.product', compact('prods', 'name', 'categories'));
    }

    public function searchShopProduct($name, $shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();
        $prods = Product::where('slug', 'like', '%' . $name . '%')->where('shop_id', $shop->id)->orderBy('name')->paginate(9);
        return view('search.shop.product', compact('prods', 'shop', 'name'));
    }

    private function checkIfExistsProducts()
    {
        //Mirar que el producto exista y si no lo quita del carrito
        if (isset($_COOKIE['cart-data'])) {
            $productCookie = htmlspecialchars($_COOKIE['cart-data']);
            $products = trim($productCookie, '|');
            $products = explode('|', $products);
            foreach ($products as $product) {
                if (!Product::find($product)) {
                    $productCookie = str_replace('|' . $product . '|', '|', $productCookie);
                }
            }
            setcookie('cart-data', $productCookie, time() + (86400 * 365), "/");
        }
    }
}

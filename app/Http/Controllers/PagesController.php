<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return view('shop.cart');
    }
}

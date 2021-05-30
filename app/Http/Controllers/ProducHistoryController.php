<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductHistory;
use App\Models\Shop;

class ProducHistoryController extends Controller
{
    public function index()
    {
        $prod_history = ProductHistory::paginate(15);
        return view('history.index', compact('prod_history'));
    }

    public function show($shop, $product)
    {
        $shop = Shop::where('slug', $shop)->get();
        $prod_history = ProductHistory::where('slug', $product)->paginate(15);
        return view('history.show', compact('prod_history'));
    }
}

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
        $prod_history = ProductHistory::orderByDesc('updated_at')->paginate(15);
        return view('history.index', compact('prod_history'));
    }

    public function show($shop, $product)
    {

        $shop = Shop::where('slug', $shop)->firstOrFail();

        if (Auth::user()->hasRole('seller') && $shop->user_id != Auth::user()->id) {
            return redirect()->route('index');
        }

        $prod_history = ProductHistory::where('slug', $product)->orderByDesc('updated_at')->paginate(15);
        return view('history.show', compact('prod_history'));
    }
}

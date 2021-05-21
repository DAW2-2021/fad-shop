<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Petition;

class ShopController extends Controller
{

    public function index($shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();
        return view('shop.index', compact('shop'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'petition_id' => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return redirect()->route('shop.admin.index')->withErrors($validator);
        }

        $petition = Petition::findOrFail($request->petition_id);
        $slug = Str::slug($petition->shop_name);
        $dbSlug = Shop::where('slug', $slug)->first();

        if ($dbSlug) {
            return redirect()->route('shop.admin.index')->withErrors(['Coincidence' => 'El nombre de la tienda ya existe.']);
        }

        $shop = Shop::create([
            'slug' => $slug, 'name' => $petition->shop_name, 'description' => $petition->shop_description,
            'logo' => $petition->shop_logo, 'user_id' => $petition->user_id
        ]);

        $petition->state = 'accepted';
        $petition->save();

        return redirect()->route('shop.index', $shop->slug);
    }

    // public function show($shop)
    // {
    //     $shop = Shop::firstOrFail('slug', $shop);
    //     return view('shop.index', compact('shop'));
    // }

    public function showSettings($shop)
    {
        $shop = Shop::firstOrFail('slug', $shop);
        //cambiar if si añadimos que puedan verlo los "empleados" del vendedor
        if ($shop->user_id == Auth::user()->id) {
            return view('shop.settings', $shop);
        }
        return redirect()->route('shop.index', compact('shop'));
    }

    public function update(Request $request, Shop $shop)
    {
        if ($shop->user_id == Auth::user()->id) {
            $validator = Validator::make($request->all(), [
                'name' => ['nullable', 'string', 'min:3', 'max:255'],
                'description' => ['nullable', 'string', 'min:3', 'max:255'],
                'logo' => ['nullable', 'mimes:png,jpg,jpeg', 'max:1024'],
            ]);
            if ($validator->fails()) {
                return redirect()->route('shop.settings', $shop->slug)->withErrors($validator);
            }

            $shop->update($request->all());
            return redirect()->route('shop.settings', $shop->id);
        }
        return redirect()->route('shop.index');
    }

    public function destroy(Shop $shop)
    {
        if ($shop->user_id == Auth::user()->id) {
            $shop->delete();
            return redirect()->route('shop.index');
        }
        return redirect()->route('shop.index');
    }
}

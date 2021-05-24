<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Petition;
use App\Models\User;
use App\Models\Category;

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
        $user = User::where('id', $petition->user_id)->first();
        $slug = Str::slug($petition->shop_name);
        $dbSlug = Shop::where('slug', $slug)->first();

        if ($dbSlug) {
            return redirect()->route('shop.admin.index')->withErrors(['Coincidence' => 'El nombre de la tienda ya existe.']);
        }

        $shop = Shop::create([
            'slug' => $slug, 'name' => $petition->shop_name, 'description' => $petition->shop_description,
            'logo' => $petition->shop_logo, 'user_id' => $petition->user_id
        ]);

        $petition->status = 'accepted';
        $petition->save();
        $user->role_id = 2;
        $user->save();
        return redirect()->route('petition.admin.index');
    }

    public function showSettings($shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();

        //cambiar if si añadimos que puedan verlo los "empleados" del vendedor
        if ($shop->user_id != Auth::user()->id) {
            return redirect()->route('shop.index', compact('shop'));
        }

        $categories = Category::orderBy('name')->get();
        return view('shop.settings', compact('shop', 'categories'));
    }

    public function update(Request $request, $shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();

        if (Auth::user()->hasRole('admin')) {
            $validator = Validator::make($request->all(), [
                'name' => ['nullable', 'string', 'min:3', 'max:255'],
                'description' => ['nullable', 'string', 'min:3', 'max:255'],
                'logo' => ['nullable', 'file', 'mimes:png,jpg,jpeg', 'max:1024', 'dimensions:width=250,height=70'],
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

    public function ban(Request $request, $shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'reason' => ['required', 'string', 'min:20']
        ]);

        if ($validator->fails()) {
            return redirect()->route('shop.index', $shop->slug)->withErrors($validator);
        }

        $shop->update(['reason' => $request->reason, 'blocked_at' =>  date("Y-m-d H:i:s")]);

        return redirect()->route('shop.index', $shop->slug);
    }

    public function unban(Request $request, $shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'reason' => ['required', 'string', 'min:20']
        ]);

        if ($validator->fails()) {
            return redirect()->route('shop.index', $shop->slug)->withErrors($validator);
        }

        $shop->update(['reason' => $request->reason, 'blocked_at' =>  null]);

        return redirect()->route('shop.index', $shop->slug);
    }
}

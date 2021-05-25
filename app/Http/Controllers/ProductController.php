<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PharIo\Manifest\Author;

class ProductController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request, $shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min_length:3', 'max_length:255'],
            'description' => ['required', 'string', 'min_length:20', 'max_length:255'],
            'price' => ['required', 'numeric', 'min:0.5'],
            'stock' => ['required', 'integer', 'min:0'],
            'categories' => ['required', 'array', 'min:1'],
            'image' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:1024', 'dimensions:width=650,height=400'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('shop.settings', $shop->slug)->withInput()->withErrors($validator);
        }

        $slug = Str::slug($request->name);
        $dbSlug = Product::where(['slug' => $slug, 'shop_id' => $shop->id])->first();

        if ($dbSlug) {
            return redirect()->route('shop.settings', $shop->slug)->withInput()->withErrors(['Coincidence' => 'Ya existe el nombre del producto en la tienda.']);
        }

        $pathImage = $request->file('image')->store('products', 'public');

        $product = $shop->products()->create([
            'name' => $request->name, 'description' => $request->description, 'price' => $request->price, 'stock' => $request->stock,
            'image' => $pathImage, 'slug' => $slug, 'user_id' => Auth::user()->id
        ]);

        foreach ($request->categories as $category) {
            $product->categories()->attach($category);
        }
        return redirect()->route('shop.product.index', [$shop->slug, $product->slug])->withInput()->withErrors(['Coincidence' => 'Ya existe el nombre del producto en la tienda.']);
    }

    public function show($shop, $product)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();
        $product = Product::where(['slug' => $product, 'shop_id' => $shop->id])->firstOrFail();
        return view('shop.product', compact('product', 'shop'));
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

<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PharIo\Manifest\Author;
use App\Models\Category;

class ProductController extends Controller
{

    public function index($shop)
    {
        $shop = Shop::where('slug', $shop)->firstOrFail();
        $products = Product::orderByDesc('id')->paginate(15);
        return view('shop.product.index')->with(['products' => $products, 'shop' => $shop]);
    }

    public function create($shop)
    {
        $categories = Category::all();
        $shop = Shop::where('slug', $shop)->firstOrFail();
        if (Auth::user()->id == $shop->user_id) {
            return view('shop.product.create', compact('shop', 'categories'));
        }
        return redirect()->route('index');
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
        $categories = Category::all();
        $shop = Shop::where('slug', $shop)->firstOrFail();
        $product = Product::where(['slug' => $product, 'shop_id' => $shop->id])->firstOrFail();
        $comments = Opinion::where('product_id', $product->id)->get();

        return view('shop.product.show', compact('product', 'shop', 'comments', 'categories'));
    }

    public function update(Request $request, $shop, $product)
    {
        $shop = Shop::where(['slug' => $shop])->firstOrFail();

        if (Auth::user()->id == $shop->user_id) {
            $validator = Validator::make($request->all(), [
                'name' => ['nullable', 'string', 'min_length:3', 'max_length:255'],
                'description' => ['nullable', 'string', 'min_length:20', 'max_length:255'],
                'price' => ['nullable', 'numeric', 'min:0.5'],
                'stock' => ['nullable', 'integer', 'min:0'],
                'categories' => ['nullable', 'array', 'min:1'],
                'image' => ['nullable', 'file', 'mimes:png,jpg,jpeg', 'max:1024', 'dimensions:width=650,height=400'],
            ]);

            $product = Product::where(['slug' => $product])->firstOrFail();

            if ($validator->fails()) {
                return redirect()->route('shop.product.show', [$shop->slug, $product->slug])->withErrors($validator);
            }

            if ($request->filled('name')) {
                $product->name = $request->name;
            }

            if ($request->filled('description')) {
                $product->description = $request->description;
            }

            if ($request->filled('price')) {
                $product->price = $request->price;
            }

            if ($request->filled('stock')) {
                $product->stock = $request->stock;
            }

            if ($request->filled('categories')) {
                $product->categories()->detach();
                foreach ($request->categories as $category) {
                    $product->categories()->attach($category);
                }
            }

            if ($request->file('image')) {
                $product->image = $request->file('image')->store('products', 'public');
            }

            $product->save();
            return redirect()->route('shop.product.show', [$shop->slug, $product->slug]);
        }
        return redirect()->route('index');
    }

    public function updateStock(Request $request, $shop, $product)
    {
        $shop = Shop::where(['slug' => $shop])->first();
        if (!$shop) {
            return redirect()->route('shop.product.index', [$shop->slug, $product->slug])->withInput()->withErrors(['Error' => 'No existe la tienda.']);
        }

        if (Auth::user()->id == $shop->user_id) {
            $validator = Validator::make($request->all(), [
                'stock' => ['required', 'integer', 'min:1', 'max:1000'],
            ]);

            $product = Product::where(['slug' => $product])->firstOrFail();

            if ($validator->fails()) {
                return redirect()->route('shop.product.show', [$shop->slug, $product->slug])->withErrors($validator);
            }

            if ($request->filled('stock')) {
                $product->stock += $request->stock;
            }

            $product->save();
            return redirect()->route('shop.product.show', [$shop->slug, $product->slug]);
        }
        return redirect()->route('index');
    }

    public function destroy($shop, $product)
    {
        $shop = Shop::where(['slug' => $shop])->firstOrFail();

        $product = Product::where(['slug' => $product, 'shop_id' => $shop->id])->firstOrFail();

        if (Auth::user()->id == $shop->user_id || Auth::user()->hasRole('seller')) {
            $product->delete();
            return redirect()->route('shop.product.index', $shop->slug);
        }

        return redirect()->route('shop.product.index', $shop->slug)->withErrors('No tienes permisos para borrar la opinion.');
    }
}

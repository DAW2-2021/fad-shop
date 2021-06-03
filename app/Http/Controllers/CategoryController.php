<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function indexAdmin()
    {
        $categories = Category::orderByDesc('id')->paginate(15);
        return view('categories.admin.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:categories', 'string', 'min_length:3', 'max_length:255'],
            'icon' => ['required', 'string', 'min_length:3', 'max_length:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('categories.admin.index')->withErrors($validator);
        }


        $slug = Str::slug($request->name);
        $dbSlug = Category::where(['slug' => $slug])->first();

        if ($dbSlug) {
            return redirect()->route('categories.admin.index')->withInput()->withErrors(['Coincidence' => 'Ya existe el nombre del producto en la tienda.']);
        }

        $category = Category::create([
            'name' => $request->name, 'icon' => $request->icon,  'slug' => $slug
        ]);
        return redirect()->route('categories.admin.index');
    }

    public function show($category)
    {
        $categories = Category::all();
        $category = Category::where('slug', $category)->firstOrFail();
        $products = $category->products()->paginate(8);
        return view('categories.show', compact('category', 'products', 'categories'));
    }

    public function showAdmin(Category $category)
    {
        $category = Category::where('slug', $category->slug)->firstOrFail();
        return view('categories.admin.show', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['nullable', 'unique:categories', 'string', 'min_length:3', 'max_length:255'],
            'icon' => ['nullable', 'string', 'min_length:3', 'max_length:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('categories.admin.index')->withErrors($validator);
        }

        if ($request->filled('name')) {
            $category->name = $request->name;
        }

        if ($request->filled('icon')) {
            $category->icon = $request->icon;
        }

        $category->save();
        return redirect()->route('categories.admin.index');
    }
}

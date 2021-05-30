<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function indexAdmin()
    {
        $categories = Category::orderByDesc('id')->paginate(15);
        return view('categories.admin.index', compact('categories'));
    }

    public function create()
    {
        return view('form.category');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($category)
    {
        $categories = Category::all();
        $category = Category::where('slug', $category)->firstOrFail();
        $products = $category->products()->paginate(9);
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

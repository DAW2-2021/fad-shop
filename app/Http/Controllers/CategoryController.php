<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
        $category = Category::where('slug', $category)->firstOrFail();
        return view('categories.show', compact('category'));
    }

    public function showAdmin(Category $category)
    {
        $category = Category::where('slug', $category->slug)->firstOrFail();
        return view('categories.admin.show', compact('category'));
    }

    public function update(Request $request, $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Category $category)
    {
        $category = Category::where('id', $category->id)->firstOrFail();
        return view('categories.show', compact('category'));
    }

    public function showAdmin(Category $category)
    {
        $category = Category::where('id', $category->id)->firstOrFail();
        return view('categories.admin.show', compact('category'));
    }

    public function update(Request $request, $id)
    {
        //
    }
}

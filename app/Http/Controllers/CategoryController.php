<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', [
            'category' => Category::latest()->get()
        ]);
    }

    public function create()
    {
        $category = '';
        return view('category.form', compact('category'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }
}

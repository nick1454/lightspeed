<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $category = '';
        return view('category.form', compact('category'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create($categoryRequest->validated());

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return abort(404);
        }

        return view('category.form', [
            'category' => $category
        ]);
    }
     public function update(CategoryRequest $categoryRequest, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return abort(404);
        }

        $category->update($categoryRequest->validated());

        return redirect()->route('category.index');
    }
    

    public function destroy($id)
        {
            $category = Category::find($id);

            if (!$category) {
                return abort(404);
            }

            $category->delete();

            return redirect()->route('category.index')->with('success', 'Category deleted successfully');
        }

    }
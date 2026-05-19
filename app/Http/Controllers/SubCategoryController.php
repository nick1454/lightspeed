<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubCategoryRequest;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::with('category')->latest()->get();

        return view('subcategory.index', [
            'subcategories' => $subcategories
        ]);
    }

    public function create()
    {
        $subcategory = '';
        $categories = Category::all();

        return view('subcategory.form', compact('subcategory', 'categories'));
    }

    public function store(SubCategoryRequest $request)
    {
        SubCategory::create($request->validated());

        return redirect()->route('subcategory.list');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $subcategory = SubCategory::find($id);

        if (!$subcategory) {
            return abort(404);
        }

        return view('subcategory.form', compact('subcategory', 'categories'));
    }

    public function update(SubCategoryRequest $request, SubCategory $subcategory)
    {
        $subcategory->update($request->validated());

        return redirect()->route('subcategory.list');
    }

    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();

        return back();
    }
}

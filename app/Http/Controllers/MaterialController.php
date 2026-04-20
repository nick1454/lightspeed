<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Unit;



class MaterialController extends Controller
{
    public function index()
    {

        return view('material.index', [
            'items' => Material::with(['category', 'subcategory', 'brand', 'size', 'unit'])->latest()->get()
        ]);
    }

    public function create()
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $sizes = Size::latest()->get();
        $units = Unit::latest()->get();

        return view('material.form', [
            'item' => new Material(),
            'categories' => $categories,
            'subcategories' => $subcategories,
            'brands' => $brands,
            'sizes' => $sizes,
            'units' => $units
        ]);
    }

    public function store(MaterialRequest $request)
    {
        $type = 'success';
        $msg = 'Material created successfully';

        if (!Material::create($request->validated())) {
            $type = 'error';
            $msg = 'Material creation failed';
        }

        return redirect()->route('material.list')->with($type, $msg);
    }

    public function edit($id)
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $sizes = Size::latest()->get();
        $units = Unit::latest()->get();

        $material = Material::find($id);

        if (!$material) {
            return abort(404);
        }

        return view('material.form', [
            'item' => $material,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'brands' => $brands,
            'sizes' => $sizes,
            'units' => $units
        ]);
    }

    public function update(MaterialRequest $request, $id)
    {
        $type = 'success';
        $msg = 'Material updated successfully';
        $material = Material::find($id);

        if (!$material) {
            return abort(404);
        }

        if (!$material->update($request->validated())) {
            $type = 'error';
            $msg = 'Material update failed';
        }

        return redirect()->route('material.list')->with($type, $msg);
    }

    public function destroy($id)
    {
        $material = Material::find($id);

        if (!$material) {
            return abort(404);
        }

        $material->delete();

        return back();
    }
}

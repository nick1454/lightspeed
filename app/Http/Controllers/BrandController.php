<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        return view('brand.index', [
            'items' => Brand::latest()->get()
        ]);
    }

    public function create()
    {
        return view('brand.form', ['item' => '']);
    }

    public function store(BrandRequest $request)
    {
        Brand::create($request->validated());

        return redirect()->route('brand.list');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return abort(404);
        }

        return view('brand.form', ['item' => $brand]);
    }

    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return abort(404);
        }

        $brand->update($request->validated());

        return redirect()->route('brand.list');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return abort(404);
        }

        $brand->delete();

        return back();
    }
}

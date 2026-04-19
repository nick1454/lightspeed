<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VendorRequest;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function index()
    {
        return view('vendor.index', [
            'items' => Vendor::latest()->get()
        ]);
    }

    public function create()
    {
        return view('vendor.form', ['item' => '']);
    }

    public function store(VendorRequest $request)
    {
        Vendor::create($request->validated());

        return redirect()->route('vendor.list');
    }

    public function edit($id)
    {
        $vendor = Vendor::find($id);

        if (!$vendor) {
            return abort(404);
        }

        return view('vendor.form', ['item' => $vendor]);
    }

    public function update(VendorRequest $request, $id)
    {
        $vendor = Vendor::find($id);

        if (!$vendor) {
            return abort(404);
        }

        $vendor->update($request->validated());

        return redirect()->route('vendor.list');
    }

    public function destroy($id)
    {
        $vendor = Vendor::find($id);

        if (!$vendor) {
            return abort(404);
        }

        $vendor->delete();

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\pomaterailsRequest;
use App\Models\Pomaterial;
use App\Models\Vendor;

class PomaterialController extends Controller
{
    public function index()
    {
        return view('pomaterial.index', [
            'items' => Pomaterial::latest()->get()
        ]);
    }

    public function create()
    {
        $pono = $this->getPoNo();
        $po = (new Pomaterial())->fill(['po_number' => $pono]);
        $vendors = $this->getSupplierList();

        return view('pomaterial.form', ['item' => $po, 'vendors' => $vendors]);
    }

    public function store(PomaterialRequest $request)
    {
        Pomaterial::create($request->validated());

        return redirect()->route('pomaterial.list');
    }

    public function edit($id)
    {
        $pomaterial = Pomaterial::find($id);

        if (!$pomaterial) {
            return abort(404);
        }

        return view('pomaterial.form', ['item' => $pomaterial]);
    }

    public function update(PomaterialRequest $request, $id)
    {
        $pomaterial = Pomaterial::find($id);

        if (!$pomaterial) {
            return abort(404);
        }

        $pomaterial->update($request->validated());
        return redirect()->route('pomaterial.list');
    }

    public function destroy($id)
    {
        $pomaterial = Pomaterial::find($id);

        if (!$pomaterial) {
            return abort(404);
        }

        $pomaterial->delete();
        return back();
    }

    private function getPoNo()
    {
        $latestPo = Pomaterial::latest()->first();

        if (!$latestPo) {
            return 1;
        }

        return $latestPo->po_number + 1;
    }

    public function getSupplierList()
    {
        return Vendor::latest()->get();
    }
}

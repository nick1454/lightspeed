<?php

namespace App\Http\Controllers;

use App\Http\Requests\PoSupplierItemsRequest;
use Illuminate\Http\Request;
use App\Models\PoSupplier;
use App\Models\PoSupplierItems;
use App\Models\Vendor;
use App\Models\Warehouse;
use App\Models\Material;
use App\Models\Unit;
use Auth;

class PoSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = PoSupplier::get();
        return view('po-supplier.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ref = PoSupplier::max('id');
        $ref = $ref ? $ref + 1 : 1;

        $item = new PoSupplier();
        $item->po_date = date('Y-m-d');
        $item->po_no = 'PO-SUP-'.$ref;
        $item->vendor_id = 0;
        $item->warehouse_id = 0;
        $item->remarks = '';
        $item->created_by = Auth::user()->id;
        $item->updated_by = Auth::user()->id;
        $item->save();

        return redirect()->route('po.supplier.edit', $item->id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = PoSupplier::find($id);
        $vendors = Vendor::getList();
        $warehouses = Warehouse::getList();
        $materials = Material::getList();
        $units = Unit::getList();

        $items = PoSupplierItems::where('po_supplier_id', $id)->get();

        return view('po-supplier.form', compact('item','vendors','warehouses','units','materials','items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $items = PoSupplierItems::where('po_supplier_id', $id)->get();

        $item = PoSupplier::find($id);
        $item->fill($request->except('_token'));
        $item->save();

        return redirect()->route('po.supplier.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = PoSupplier::find($id);
        $items = PoSupplierItems::where('po_supplier_id', $id)->get();

        if (!$items->isEmpty()) {
            $items->each(function($item) {
                $item->delete();
            });
        }

        if (!$item || !$item->delete()) {
            return redirect()->back()->with('error', 'Failed to delete.');
        }
        return redirect()->route('po.supplier.list');
    }

    public function storeItem(PoSupplierItemsRequest $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die;

        $item = PoSupplierItems::updateOrCreate([
            'id' => $request->item_id,
        ], [
            'po_supplier_id' => $request->po_supplier_id,
            'material_id' => $request->material_id,
            'material_name' => $request->material_name,
            'rate' => $request->rate,
            'quantity' => $request->quantity,
            'unit_id' => 0,
            'amount' => $request->rate * $request->quantity,
            'po_id' => 0,
            'remarks' => $request->remarks,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('success', 'Item added.');
    }

    public function deleteItem($id)
    {
        $item = PoSupplierItems::find($id);
        if (!$item || !$item->delete()) {
            return redirect()->back()->with('error', 'Failed to delete item.');
        }
        return redirect()->back()->with('success', 'Item deleted.');
    }
}

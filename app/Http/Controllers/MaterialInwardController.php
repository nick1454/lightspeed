<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Material;
use App\Models\MaterialInward;
use App\Http\Requests\MaterialInwardRequest;
use App\Http\Requests\MaterialInwardItemsRequest;
use App\Models\MaterialInwardItems;
use App\Models\Vendor;
use App\Models\Warehouse;

class MaterialInwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = MaterialInward::get();
        return view('materialinward.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ref = MaterialInward::max('id');
        $ref = $ref ? $ref + 1 : 1;

        $item = new MaterialInward();
        $item->in_date = date('Y-m-d');
        $item->inward_no = 'IN-'.$ref;
        $item->vendor_inward_no = '';
        $item->vendor_id = 0;
        $item->warehouse_id = 0;
        $item->remarks = '';
        $item->created_by_id = Auth::user()->id;
        $item->updated_by_id = Auth::user()->id;
        $item->is_draft = 1;
        $item->save();

        return redirect()->route('materialinward.edit', $item->id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterialInwardRequest $request)
    {
        return redirect()->route('materialinward.list');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('materialinward.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = MaterialInward::find($id);
        $vendors = Vendor::getList();
        $warehouses = Warehouse::getList();
        $materials = Material::getList();

        $items = MaterialInwardItems::where('material_inward_id', $id)->get();

        return view('materialinward.form', compact('item','vendors','warehouses','materials','items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterialInwardRequest $request, $id)
    {
        $items = MaterialInwardItems::where('material_inward_id', $id)->get();

        if ($items->isEmpty()) {
            return redirect()->back()->with('error', 'No items added.');
        }

        $item = MaterialInward::find($id);
        $item->fill($request->all());
        $item->save();

        return redirect()->route('materialinward.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = MaterialInward::find($id);
        $items = MaterialInwardItems::where('material_inward_id', $id)->get();

        if (!$items->isEmpty()) {
            $items->each(function($item) {
                $item->delete();
            });
        }

        if (!$item || !$item->delete()) {
            return redirect()->back()->with('error', 'Failed to delete.');
        }

        return redirect()->route('materialinward.list');
    }

    public function storeItem(MaterialInwardItemsRequest $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die;

        $item = MaterialInwardItems::updateOrCreate([
            'id' => $request->item_id,
        ], [
            'material_inward_id' => $request->material_inward_id,
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
        $inwardItem = MaterialInwardItems::find($id);
        if (!$inwardItem || !$inwardItem->delete()) {
            return redirect()->back()->with('error', 'Failed to delete item.');
        }
        return redirect()->back()->with('success', 'Item deleted.');
    }

}

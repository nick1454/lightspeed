<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MaterialOutwardRequest;
use App\Http\Requests\MaterialOutwardItemsRequest;
use App\Models\MaterialOutwardItems;
use App\Models\MaterialOutward;
use App\Models\Vendor;
use App\Models\Warehouse;
use App\Models\Material;
use Auth;

class MaterialOutwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = MaterialOutward::get();

        return view('materialoutward.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ref = MaterialOutward::max('id');
        $ref = $ref ? $ref + 1 : 1;

        $item = new MaterialOutward();
        $item->out_date = date('Y-m-d');
        $item->outward_no = 'OUT-'.$ref;
        $item->vendor_id = 0;
        $item->warehouse_id = 0;
        $item->remarks = '';
        $item->created_by_id = Auth::user()->id;
        $item->updated_by_id = Auth::user()->id;
        $item->is_draft = 1;
        $item->save();

        return redirect()->route('materialoutward.edit', $item->id);
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
        $outward = MaterialOutward::with(['materialOutwardItems'])->find($id);
        if (!$outward) {
            return redirect()->back()->with('error', 'Outward not found.');
        }

        return view('materialoutward.print', compact('outward'));
    }

    /**s
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = MaterialOutward::find($id);
        $vendors = Vendor::getList();
        $warehouses = Warehouse::getList();
        $materials = Material::getList();

        $items = MaterialOutwardItems::where('material_outward_id', $id)->get();
        // echo "<pre>";
        // print_r($item);
        // die;
        return view('materialoutward.form', compact('item','vendors','warehouses','materials','items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterialOutwardRequest $request, string $id)
    {
        $item = MaterialOutward::find($id);
        $item->fill($request->all());
        $item->updated_by_id = Auth::user()->id;
        $item->is_draft = 0;
        $item->save();

        return redirect()->route('materialoutward.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = MaterialOutward::find($id);
        $items = MaterialOutwardItems::where('material_outward_id', $id)->get();

        if (!$items->isEmpty()) {
            $items->each(function($item) {
                $item->delete();
            });
        }

        if (!$item || !$item->delete()) {
            return redirect()->back()->with('error', 'Failed to delete.');
        }

        return redirect()->route('materialoutward.list');
    }

    public function storeItem(MaterialOutwardItemsRequest $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die;

        $item = MaterialOutwardItems::updateOrCreate([
            'id' => $request->item_id,
        ], [
            'material_outward_id' => $request->material_outward_id,
            'material_id' => $request->material_id,
            'material_name' => $request->material_name,
            'rate' => $request->rate,
            'quantity' => $request->quantity,
            'unit_id' => 0,
            'amount' => $request->rate * $request->quantity,
            'po_id' => 0,
            'remarks' => $request->remarks,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', 'Item added.');
    }

    public function deleteItem($id)
    {
        $outwardItem = MaterialOutwardItems::find($id);

        if (!$outwardItem || !$outwardItem->delete()) {
            return redirect()->back()->with('error', 'Failed to delete item.');
        }
        return redirect()->back()->with('success', 'Item deleted.');
    }
}

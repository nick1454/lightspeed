<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaterialTransferItem;
use App\Models\MaterialTransfer;
use App\Http\Requests\MaterialTransferRequest;
use App\Http\Requests\MaterialTransferItemsRequest;
use App\Models\Warehouse;
use App\Models\Material;
use Auth;

class MaterialTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = MaterialTransfer::with(['warehouseFrom','warehouseTo'])->get();
        return view('materialtransfer.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ref = MaterialTransfer::max('id');
        $ref = $ref ? $ref + 1 : 1;

        $item = new MaterialTransfer();
        $item->transfer_date = date('Y-m-d');
        $item->transfer_no = 'TF-'.$ref;
        $item->manual_transfer_no = '';
        $item->warehouse_from_id = 0;
        $item->warehouse_to_id = 0;
        $item->remarks = '';
        $item->created_by_id = Auth::user()->id;
        $item->updated_by_id = Auth::user()->id;
        $item->is_draft = 1;
        $item->save();

        return redirect()->route('materialtransfer.edit', $item->id);
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
    public function edit($id)
    {
        $item = MaterialTransfer::find($id);
        $warehouses = Warehouse::getList();
        $materials = Material::getList();

        $items = MaterialTransferItem::where('material_transfer_id', $id)->get();

        return view('materialtransfer.form', compact('item','warehouses','materials','items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterialTransferRequest $request, $id)
    {
        $item = MaterialTransfer::find($id);

        if (!$item) {
            return redirect()->to('materialtransfer.index')->withError('Transfer not found.');
        }

        if ($item->is_draft == 1){
            $item->is_draft = 0;
        }

        $item->fill($request->all());
        $item->save();

        return redirect()->back()->withSuccess('Transfer Updated successfully.');
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

    /**
     * Add Or Update the specified resource items from storage.
     */
    public function storeItem(MaterialTransferItemsRequest $request)
    {
        $item = MaterialTransferItem::updateOrCreate([
            'id' => $request->item_id,
        ], [
            'material_transfer_id' => $request->material_transfer_id,
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

    /**
     * Remove the specified resource items from storage.
     */
    public function deleteItem($id)
    {
        $transferItem = MaterialTransferItem::find($id);
        if (!$transferItem || !$transferItem->delete()) {
            return redirect()->back()->with('error', 'Failed to delete item.');
        }
        return redirect()->back()->with('success', 'Item deleted.');
    }
}

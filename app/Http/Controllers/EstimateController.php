<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Http\Requests\EstimateItemsRequest;
use App\Http\Requests\EstimateRequest;
use App\Models\EstimateItems;
use App\Models\Estimate;
use App\Models\Client;
use App\Models\PoJobWorkItem;
use App\Models\PoJobWork;
use Auth;
use DB;


class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Estimate::all();
        return view('estimate.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ref = Estimate::max('id');
        $ref = $ref ? $ref + 1 : 1;

        $item = new Estimate();
        $item->estimate_date = date('Y-m-d');
        $item->estimate_no = 'ES-'.$ref;
        $item->client_id = 0;
        $item->remarks = '';
        $item->created_by_id = Auth::user()->id;
        $item->updated_by_id = Auth::user()->id;
        $item->status = 'draft';
        $item->save();

        return redirect()->route('estimate.edit', $item->id);
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
        $item = Estimate::with('estimateItems')->find($id);
        $clients = Client::all();
        $materials = Material::getList();

        return view('estimate.form', compact('item', 'clients', 'materials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Estimate::find($id);
        $item->fill($request->all());
        $item->save();

        return redirect()->back()->withSuccess('Estimate Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Estimate::find($id);
        $items = EstimateItems::where('estimate_id', $id)->get();

        if (!$items->isEmpty()) {
            $items->each(function($item) {
                $item->delete();
            });
        }

        if (!$item || !$item->delete()) {
            return redirect()->back()->with('error', 'Failed to delete.');
        }

        return redirect()->back()->with('success', 'Estimate Deleted successfully.');
    }

        /**
     * Add Or Update the specified resource items from storage.
     */
    public function storeItem(EstimateItemsRequest $request)
    {
        $item = EstimateItems::updateOrCreate([
            'id' => $request->item_id,
        ], [
            'estimate_id' => $request->estimate_id,
            'material_id' => $request->material_id,
            'material_name' => $request->material_name,
            'description' => '',
            'rate' => $request->rate,
            'quantity' => $request->quantity,
            'unit_id' => 0,
            'amount' => $request->rate * $request->quantity,
            'remarks' => $request->remarks,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('success', 'Item added.');
    }

    public function deleteItem($id)
    {
        $item = EstimateItems::find($id);
        if (!$item || !$item->delete()) {
            return redirect()->back()->with('error', 'Failed to delete item.');
        }
        return redirect()->back()->with('success', 'Item deleted.');
    }

    public function changeStatus(Request $request, $id)
    {
        $item = Estimate::find($id);

        if (!$item) {
            return redirect()->back()->with('error', 'Failed to find estimate.');
        }

        $item->status = $request->status;
        $item->save();

        return redirect()->back()->withSuccess('Status changed successfully.');
    }

    /**
     * Make job work po.
     */
    public function makeJobWorkPo(string $id)
    {
        DB::beginTransaction();

        try {

            $estimate = Estimate::with(['client', 'estimateItems'])->find($id);

            if (!$estimate) {
                return redirect()->back()->with('error', 'Failed to find estimate.');
            }

            $ref = (PoJobWork::max('id') ?? 0) + 1;

            $jobwork = new PoJobWork();

            $jobwork->po_no = 'JO-' . $ref;
            $jobwork->client = $estimate->client_id;
            $jobwork->contact = $estimate->client?->phone;
            $jobwork->description = '';
            $jobwork->location = '';
            $jobwork->type = '';
            $jobwork->remarks = $estimate->remarks;
            $jobwork->created_by_id = auth()->id();
            $jobwork->updated_by_id = auth()->id();
            $jobwork->status = 'pending';

            $jobwork->save();

            $jobworkItems = $estimate->estimateItems->map(function ($item) use ($jobwork, $estimate) {

                return [
                    'job_work_id' => $jobwork->id,
                    'estimate_id' => $estimate->id,

                    'material_id' => $item->material_id,
                    'material_name' => $item->material_name,

                    'rate' => $item->rate,
                    'quantity' => $item->quantity,

                    'amount' => $item->amount,
                    'created_by_id' => auth()->id(),
                    'updated_by_id' => auth()->id(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            });

            PoJobWorkItem::insert($jobworkItems->toArray());

            DB::commit();

            return redirect()->route('po.job.work.edit', $jobwork->id);

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

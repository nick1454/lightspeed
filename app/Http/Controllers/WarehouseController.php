<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WarehouseRequest;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function index()
    {
        return view('warehouse.index', [
            'items' => Warehouse::latest()->get()
        ]);
    }

    public function create()
    {
        return view('warehouse.form', ['item' => '']);
    }

    public function store(WarehouseRequest $request)
    {
        Warehouse::create($request->validated());

        return redirect()->route('warehouse.list');
    }

    public function edit($id)
    {
        $warehouse = Warehouse::find($id);

        if (!$warehouse) {
            return abort(404);
        }

        return view('warehouse.form', ['item' => $warehouse]);
    }

    public function update(WarehouseRequest $request, $id)
    {
        $warehouse = Warehouse::find($id);

        if (!$warehouse) {
            return abort(404);
        }

        $warehouse->update($request->validated());

        return redirect()->route('warehouse.list');
    }

    public function destroy($id)
    {
        $warehouse = Warehouse::find($id);

        if (!$warehouse) {
            return abort(404);
        }

        $warehouse->delete();

        return back();
    }
}

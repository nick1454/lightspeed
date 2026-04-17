<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UnitRequest;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index()
    {
        return view('unit.index', [
            'units' => Unit::latest()->get()
        ]);
    }

    public function create()
    {
        $unit = '';
        return view('unit.form',compact('unit'));
    }

    public function store(UnitRequest $request)
    {
        Unit::create($request->validated());

        return redirect()->route('unit.list');
    }

    public function edit($id)
    {
        $unit = Unit::find($id);

        if (!$unit) {
            return abort(404);
        }

        return view('unit.form', [
            'unit' => $unit
        ]);
    }

    public function update(UnitRequest $request, $id)
    {
        $unit = Unit::find($id);

        if (!$unit) {
            return abort(404);
        }

        $unit->update($request->validated());

        return redirect()->route('unit.list');
    }

    public function destroy($id)
    {
        $unit = Unit::find($id);

        if (!$unit) {
            return abort(404);
        }

        $unit->delete();

        return redirect()->route('unit.list')->with('success', 'Unit deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SizeRequest;
use App\Models\Size;

class SizeController extends Controller
{
    public function index()
    {
        return view('size.index', [
            'items' => Size::latest()->get()
        ]);
    }

    public function create()
    {
        return view('size.form', ['item' => '']);
    }

    public function store(SizeRequest $request)
    {
        Size::create($request->validated());

        return redirect()->route('size.list');
    }

    public function edit($id)
    {
        $size = Size::find($id);

        if (!$size) {
            return abort(404);
        }

        return view('size.form', ['item' => $size]);
    }

    public function update(SizeRequest $request, $id)
    {
        $size = Size::find($id);

        if (!$size) {
            return abort(404);
        }

        $size->update($request->validated());

        return redirect()->route('size.list');
    }

    public function destroy($id)
    {
        $size = Size::find($id);

        if (!$size) {
            return abort(404);
        }

        $size->delete();

        return back();
    }
}

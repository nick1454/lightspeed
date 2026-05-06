<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisation;
use App\Http\Requests\OrganisationRequest;

class OrganisationController extends Controller
{
    //
    public function index()
    {
        $organisations = Organisation::all();
        return view('organisation.index', compact('organisations'));
    }

    public function create()
    {
        $organisation = new Organisation();
        return view('organisation.form',compact('organisation'));
    }

    public function store(OrganisationRequest $request)
    {
        Organisation::create($request->validated());

        return redirect()->route('organisation.list');
    }

    public function edit($id)
    {
        $organisation = Organisation::find($id);

        if (!$organisation) {
            return abort(404);
        }

        return view('organisation.form', [
            'organisation' => $organisation
        ]);
    }

    public function update(OrganisationRequest $request, $id)
    {
        $organisation = Organisation::find($id);

        if (!$organisation) {
            return abort(404);
        }

        $organisation->update($request->validated());

        return redirect()->route('organisation.list');
    }

    public function destroy($id)
    {
        $organisation = Organisation::find($id);

        if (!$organisation) {
            return abort(404);
        }

        $organisation->delete();

        return redirect()->route('organisation.list')->with('success', 'Organisation deleted successfully');
    }
}

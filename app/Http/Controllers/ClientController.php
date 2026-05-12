<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Client::all();
        return view('client.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ref = Client::max('id');
        $ref = $ref ? $ref + 1 : 1;

        $item = new Client();
        $item->name = '';
        $item->created_by_id = Auth::user()->id;
        $item->updated_by_id = Auth::user()->id;
        $item->save();

        return redirect()->route('client.edit', $item->id);
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
        $item = Client::find($id);

        if (!$item) {
            return abort(404);
        }

        return view('client.form', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Client::find($id);
        $item->name = $request->name;
        $item->email = $request->email;
        $item->phone = $request->phone;
        $item->address = $request->address;
        $item->city = $request->city;
        $item->state = $request->state;
        $item->country = $request->country;
        $item->updated_by_id = Auth::user()->id;
        $item->save();

        return redirect()->back()->with('success', 'Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);

        if (!$client) {
            return abort(404);
        }

        $client->delete();

        return back()->with('success', 'Client deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PoJobWork;
use App\Models\PoJobWorkItem;
use Auth;

class PoJobWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = PoJobWork::get();
        return view('po-job-work.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

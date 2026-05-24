<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleInvoice;
use App\Models\Vendor;
use App\Models\Client;
use App\Models\Material;

class SaleInvoiceController extends Controller
{
    public function index()
    {
        $saleInvoices = SaleInvoice::all();

        return view('sale_invoice.index', compact('saleInvoices'));
    }
    public function create()
    {
        $vendors = Vendor::getList();

        $item = new SaleInvoice();
        $item->invoice_date = date('Y-m-d');
        $item->invoice_no = 'INV-'. (SaleInvoice::max('id')+1);
        $item->client_id = 0;
        $item->total_amount = 0;
        $item->created_by_id = auth()->user()->id;
        $item->updated_by_id = auth()->user()->id;

        $materials = Material::all();
        
         
        $item->save();

        return redirect()->route('sale.invoice.edit', $item->id);


    }

    public function edit($id)
    {
        $item = SaleInvoice::findOrFail($id);

        $clients = Client::all();
        $materials = Material::all();

            return view('sale_invoice.form', compact('item', 'clients', 'materials'));

    }
    public function update(Request $request, $id)
    {
        $saleInvoice = SaleInvoice::findOrFail($id);

        $saleInvoice->update($request->all());

        return redirect()->route('sale.invoice.list',)->with('success', 'Sale Invoice updated successfully.');
    }



}
    







 
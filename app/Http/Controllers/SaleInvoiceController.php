<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleInvoice;

class SaleInvoiceController extends Controller
{
    public function index()
    {
        $saleInvoices = SaleInvoice::all();

        return view('saleinvoice.index', compact('saleInvoices'));
    }
}
    



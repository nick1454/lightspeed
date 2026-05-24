<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleInvoiceItem extends Model
{
    protected $fillable = [
        'id',
        'sale_invoice_id',
        'material_id',
        'material_name',
        'qty',
        'rate',
        'taxable_amount', 
        'tax_percentage',
        'invoice_amount',
        'created_by_id',
        'updated_by_id',
        'created_at',
        'updated_at',
    ];

    public function saleInvoice()
    {
        return $this->belongsTo(SaleInvoice::class, 'sale_invoice_id');
    }
}

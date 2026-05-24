<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    protected $fillable = [
        
        'id',   
        'client',
        'invoice_date',
        'invoice_no',
        'total_amount',
        'created_by_id',
        'updated_by_id',
    ];
    public function items()
    {
        return $this->hasMany(SaleInvoiceItem::class, 'sale_invoice_id');
    }
 
  public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}

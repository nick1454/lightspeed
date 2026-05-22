<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    protected $fillable = [
        'client',
        'invoice_date',
        'invoice_no',
        'total_amount',
        'created_by_id',
        'updated_by_id',
    ];
}

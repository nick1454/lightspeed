<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pomaterial extends Model
{
    protected $fillable = [
        'po_number',
        'supplier_id',
        'order_date',
        'expected_date',
        'subtotal',
        'tax',
        'total',
        'status',
        'notes'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoSupplierItems extends Model
{
    protected $fillable = [
        'id',
        'po_supplier_id',
        'material_id',
        'material_name',
        'rate',
        'quantity',
        'amount',
        'remarks',
    ];
}

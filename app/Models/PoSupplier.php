<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoSupplier extends Model
{
    protected $fillable = [
        'po_no',
        'po_date',
        'vendor_id',
        'warehouse_id',
        'remarks',
        'status',
        'created_by_id',
        'updated_by_id',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }
}

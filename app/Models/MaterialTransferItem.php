<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialTransferItem extends Model
{
    protected $fillable = [
        'material_transfer_id',
        'material_id',
        'material_name',
        'rate',
        'quantity',
        'unit_id',
        'amount',
        'po_id',
        'remarks',
        'user_id'
    ];
}

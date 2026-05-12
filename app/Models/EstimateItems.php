<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstimateItems extends Model
{
    protected $table = 'estimate_items';
    protected $fillable = [
        'estimate_id',
        'material_id',
        'material_name',
        'rate',
        'quantity',
        'unit_id',
        'amount',
        'description',
    ];
}

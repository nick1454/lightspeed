<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialInwardItems extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'material_inward_id',
        'material_id',
        'material_name',
        'quantity',
        'unit_id',
        'rate',
        'amount',
        'po_id',
        'remarks',
        'user_id',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialOutwardItems extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'material_outward_id',
        'material_id',
        'material_name',
        'quantity',
        'unit_id',
        'rate',
        'amount',
        'remarks',
        'user_id',
        'po_id',
    ];
}

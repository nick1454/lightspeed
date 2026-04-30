<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialOutward extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'out_date',
        'outward_no',
        'vendor_outward_no',
        'vendor_id',
        'warehouse_id',
        'total_amount',
        'remarks',
        'user_id',
        'is_draft',
        'created_by_id',
        'updated_by_id',

    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }



    public function items()
    {
        return $this->hasMany(MaterialOutwardItems::class);
    }
}

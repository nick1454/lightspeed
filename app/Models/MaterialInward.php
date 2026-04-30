<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialInward extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'in_date',
        'inward_no',
        'vendor_inward_no',
        'vendor_id',
        'warehouse_id',
        'total_amount',
        'remarks',
        'user_id',
        'is_draft',
    ];

    public function items()
    {
        return $this->hasMany(MaterialInwardItems::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}

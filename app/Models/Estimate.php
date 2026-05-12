<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id',
        'estimate_no',
        'estimate_date',
        'estimate_amount',
        'status',
    ];

    public function estimateItems()
    {
        return $this->hasMany(EstimateItems::class, 'estimate_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}

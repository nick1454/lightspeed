<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoJobWorkItem extends Model
{
    protected $fillable = [
        'job_work_id',
        'material_id',
        'material_name',
        'quantity',
        'rate',
        'amount',
        'created_by_id',
        'updated_by_id'
    ];
}

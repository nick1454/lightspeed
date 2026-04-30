<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoJobWork extends Model
{
    protected $fillable = [
        'po_no',
        'client',
        'contact',
        'description',
        'location',
        'type',
        'status',
        'remarks',
        'created_by_id',
        'updated_by_id'
    ];
}

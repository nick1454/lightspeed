<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $fillable = [
        'name',
        'short_name',
        'description',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip',
    ];
}

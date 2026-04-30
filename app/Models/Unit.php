<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'name',
        'short_name',
        'description',
    ];

    public static function getList()
    {
        return self::all()->pluck('name', 'id');
    }
}

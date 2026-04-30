<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['name','address'];

    public static function getList()
    {
        return self::select('id', 'name')->orderBy('name', 'asc')->get();
    }
}

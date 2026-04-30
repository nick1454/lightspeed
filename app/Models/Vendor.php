<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = ['name', 'email','phone','address','gst'];

    public function materialinwards()
    {
        return $this->hasMany(MaterialInward::class);
    }

    public function materialinwarditems()
    {
        return $this->hasMany(MaterialInwardItems::class);
    }

    public static function getList()
    {
        return self::select('id','name')->get();
    }
}

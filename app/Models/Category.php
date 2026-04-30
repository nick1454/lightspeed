<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model

{
    protected $fillable = [
        'name',
        'description'
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public static function getList()
    {
        return self::latest()->select('id', 'name')->get();
    }
}


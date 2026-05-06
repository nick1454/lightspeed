<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialTransfer extends Model
{
    protected $fillable = [
        'transfer_date',
        'transfer_no',
        'manual_transfer_no',
        'warehouse_from_id',
        'warehouse_to_id',
        'remarks',
        'created_by_id',
        'updated_by_id',
        'is_draft',
    ];

    public function materialTransferItems()
    {
        return $this->hasMany(MaterialTransferItem::class, 'material_transfer_id');
    }

    public function warehouseFrom()
    {
        return $this->hasOne(Warehouse::class, 'id', 'warehouse_from_id');
    }

    public function warehouseTo()
    {
        return $this->hasOne(Warehouse::class, 'id', 'warehouse_to_id');
    }
}

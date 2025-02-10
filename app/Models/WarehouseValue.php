<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseValue extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'warehouse_id',
        'row_material_id',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function row_material()
    {
        return $this->belongsTo(RowMaterial::class, 'row_material_id');
    }
    public function sent_histories()
    {
        return $this->hasMany(History::class, 'from_id');
    }

    public function received_histories()
    {
        return $this->hasMany(History::class, 'to_id');
    }
}

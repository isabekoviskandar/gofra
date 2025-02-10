<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'type',
        'status',
        'row_material_id',
        'quantity',
        'pass',
        'now',
        'from_id',
        'to_id',
    ];

    public function row_material()
    {
        return $this->belongsTo(RowMaterial::class , 'row_material_id');
    }

    public function sender()
    {
        return $this->belongsTo(WarehouseValue::class , 'from_id');
    }

    public function receiver()
    {
        return $this->belongsTo(WarehouseValue::class , 'to_id');
    }

}

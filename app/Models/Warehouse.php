<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable  = 
    [
        'user_id',
        'name',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function warehouse_value()
    {
        return $this->hasOne(WarehouseValue::class , 'warehouse_id');
    }
}

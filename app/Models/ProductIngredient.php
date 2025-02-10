<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIngredient extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'product_id',
        'row_material_id',
        'value',
        'unit',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }

    public function row_material()
    {
        return $this->belongsTo(RowMaterial::class , 'row_material_id');
    }
}

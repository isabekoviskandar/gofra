<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'name',
        'image',
    ];

    public function manifacture()
    {
        return $this->hasMany(Manifacture::class , 'product_id');
    }

    public function product_ingredient()
    {
        return $this->hasMany(ProductIngredient::class , 'product_id');
    }
}

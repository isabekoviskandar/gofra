<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RowMaterial extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($rowMaterial) {
            $rowMaterial->slug = static::generateUniqueSlug($rowMaterial->name);
        });
    }
    public static function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }

    public function row_invoice()
    {
        return $this->hasMany(RowInvoice::class);
    }

    public function warehouse_value()
    {
        return $this->hasMany(WarehouseValue::class , 'row_material_id');
    }

    public function history()
    {
        return $this->hasMany(History::class , 'row_material_id');
    }

    public function product_ingredient()
    {
        return $this->hasMany(ProductIngredient::class , 'row_material_id');
    }
}


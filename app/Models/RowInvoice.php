<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RowInvoice extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'invoice_id',
        'row_material_id',
        'unit',
        'quantity',
        'price',
        'summ',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    public function row_material()
    {
        return $this->belongsTo(RowMaterial::class, 'row_material_id');
    }

    // In RowInvoice model
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->summ = $model->quantity * $model->price;
        });

        static::updating(function ($model) {
            $model->summ = $model->quantity * $model->price;
        });
    }
}

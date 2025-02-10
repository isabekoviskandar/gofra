<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineProduct extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'manifacture_id',
        'machine_id',
        'count',
        'useless',
    ];

    public function manifacture()
    {
        return $this->belongsTo(Manifacture::class , 'manifacture_id');
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class  , 'machine_id');
    }
}

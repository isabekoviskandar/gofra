<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    protected $fillable = ['name','status'];

    public function permissions()
    {
        return $this->hasMany(Permission::class,'group_id');
    }
}

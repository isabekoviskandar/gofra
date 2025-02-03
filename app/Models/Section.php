<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name'];

    public function workers()
    {
        return $this->hasMany(Worker::class, 'section_id');
    }
}

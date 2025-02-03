<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = ['phone','address','section_id','user_id','salary','salary_type'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
}

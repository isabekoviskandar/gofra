<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['key','name','group_id','status'];

    public function roles()
    {
        return $this->belongsToMany('role_permissions','permission_id','role_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class,'group_id');
    }
}

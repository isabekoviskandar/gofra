<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('admin.groups.index', compact('groups'));
    }

    public function status(Group $group)
    {
        $group->status = !$group->status;
        $group->save();

        $permissions = $group->permissions;

        foreach ($permissions as $permission) {
            $permission->status = $group->status;
            $permission->save();
        }

        return redirect()->route('groups.index')->with('update', 'Group status updated successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusPermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(10);
        return view('admin.permissions.index', compact('permissions'));
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update([
            'name' => $request->name,
        ]);

        return redirect()->route('permissions.index')->with('update', 'Permission updated successfully.');
    }

    public function status(Permission $permission)
    {
        $permission->update([
            'status' => !$permission->status,
        ]);
        $permission->save();

        return redirect()->route('permissions.index')->with('update', 'Status updated');
    }

}

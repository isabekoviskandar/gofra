<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Group;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->orderBy('id', 'desc')->paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::with('permissions')->get();
        return view('admin.roles.create', compact('groups'));
    }


    public function store(CreateRoleRequest $request)
    {
        $data = $request->validated();
        $role = Role::create($data);
        $role->permissions()->attach($request->permissions);

        return redirect()->route('roles.index')->with('create', 'Created');
    }

    public function edit(Role $role)
    {
        $groups = Group::with('permissions')->get();

        return view('admin.roles.edit', compact('role', 'groups'));
    }


    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->name = $request->name;
        $role->permissions()->sync($request->permissions);
        $role->save();
        return redirect()->route('roles.index')->with('update', 'Updated');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('delete', 'deleted');
    }
    public function status(Role $role)
    {
        if ($role) {
            $role->status = !$role->status;
            $role->save();
        }

        return redirect()->route('roles.index')->with('update', 'Status updated');
    }
}

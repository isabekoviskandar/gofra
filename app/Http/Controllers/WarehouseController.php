<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warehouse;
use App\Models\WarehouseMaterial;
use App\Models\WarehouseValue;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('admin.warehouse.index', compact('warehouses'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.warehouse.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'is_active' => 'boolean'
        ]);

        Warehouse::create($validated);
        return redirect()->route('warehouses.index')->with('success', 'Warehouse created successfully.');
    }

    public function show($id)
    {
        $sklads = WarehouseValue::with(['row_material', 'warehouse'])
            ->get();
        $warehouses = Warehouse::all();
        return view('admin.warehouse.show', compact('sklads', 'warehouses'));
    }

    public function edit(Warehouse $warehouse)
    {
        $users = User::all();
        return view('admin.warehouse.edit', compact('warehouse', 'users'));
    }

    public function update(Request $request, Warehouse $warehouse)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'is_active' => 'boolean'
        ]);

        $warehouse->update($validated);
        return redirect()->route('warehouses.index')->with('success', 'Warehouse updated successfully.');
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return redirect()->route('warehouses.index')->with('success', 'Warehouse deleted successfully.');
    }

    public function transfer(Request $request)
    {
        $validated = $request->validate([
            'material_id' => 'required|exists:warehouse_materials,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'quantity' => 'required|numeric|min:1',
            'real' => 'required|exists:warehouses,id'
        ]);

        $sourceMaterial = WarehouseValue::findOrFail($validated['material_id']);

        if ($sourceMaterial->value < $validated['quantity']) {
            return back()->with('error', 'Insufficient material quantity');
        }

        $sourceMaterial->decrement('value', $validated['quantity']);

        WarehouseValue::create([
            'warehouse_id' => $validated['warehouse_id'],
            'material_id' => $sourceMaterial->material_id,
            'value' => $validated['quantity']
        ]);

        return back()->with('update', 'Material transferred successfully');
    }
}
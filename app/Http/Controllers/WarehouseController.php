<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseCreateRequest;
use App\Http\Requests\WarehouseUpdateRequest;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('admin.warehouse.index', compact('warehouses' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view('admin.warehouse.create' , compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WarehouseCreateRequest $request)
    {
        Warehouse::create($request->validated());
        return redirect()->route('warehouses.index')->with('success', 'Warehouse created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Warehouse $warehouse)
    {
        return view('admin.warehouse.show', compact('warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $warehouse)
    {   
        $users = User::all();
        return view('admin.warehouse.edit', compact('warehouse' , 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WarehouseUpdateRequest $request , Warehouse $warehouse)
    {
        $warehouse->update($request->validated());
    
        return redirect()->route('warehouses.index')->with('success', 'Warehouse updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();

        return redirect()->route('warehouses.index')->with('success', 'Warehouse deleted successfully.');
    }
}

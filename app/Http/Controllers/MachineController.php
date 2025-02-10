<?php
namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::all();
        return view('admin.machine.index', compact('machines'));
    }

    public function create()
    {
        return view('admin.machine.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'status' => 'nullable|string',
        ]);

        Machine::create($validated);
        return redirect()->route('machines.index')->with('success', 'Machine created successfully.');
    }

    public function edit($id)
    {
        $machine = Machine::findOrFail($id);
        return view('admin.machine.edit', compact('machine'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'status' => 'nullable|string',
        ]);

        $machine = Machine::findOrFail($id);
        $machine->update($validated);
        return redirect()->route('machines.index')->with('success', 'Machine updated successfully.');
    }

    public function destroy($id)
    {
        $machine = Machine::findOrFail($id);
        $machine->delete();
        return redirect()->route('machines.index')->with('success', 'Machine deleted successfully.');
    }
}

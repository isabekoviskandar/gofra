<?php

namespace App\Http\Controllers;

use App\Http\Requests\RawMaterialCreateRequest;
use App\Models\RowMaterial;
use Illuminate\Http\Request;

class RowMaterialController extends Controller
{
    public function index()
    {
        $rowMaterials = RowMaterial::all();
        return view('admin.raw_materials.index', compact('rowMaterials'));
    }

    public function create()
    {
        return view('admin.raw_materials.create');
    }
    public function store(RawMaterialCreateRequest $request)
    {
        $data = $request->validated();
        $existingSlug = RowMaterial::where('slug', RowMaterial::generateUniqueSlug($data['name']))->exists();

        if ($existingSlug) {
            return redirect()->back()->withErrors(['name' => 'The raw material name is already taken.']);
        }

        $data['slug'] = RowMaterial::generateUniqueSlug($data['name']);
        RowMaterial::create($data);

        return redirect()->route('row_materials.index')->with('success', 'Raw material created successfully.');
    }

    public function update(RawMaterialCreateRequest $request, RowMaterial $rowMaterial)
    {
        $data = $request->validated();

        if ($data['name'] !== $rowMaterial->name) {
            $existingSlug = RowMaterial::where('slug', RowMaterial::generateUniqueSlug($data['name']))->exists();

            if ($existingSlug) {
                return redirect()->back()->withErrors(['name' => 'The raw material name is already taken.']);
            }

            $data['slug'] = RowMaterial::generateUniqueSlug($data['name']);
        }

        $rowMaterial->update($data);

        return redirect()->route('row_materials.index')->with('success', 'Raw material updated successfully.');
    }
}

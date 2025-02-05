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
        $data['slug'] = RowMaterial::generateUniqueSlug($data['name']);
        RowMaterial::create($data);
        return redirect()->route('row_materials.index');
    }

    public function edit($id)
    {
        $rowMaterial = RowMaterial::findOrFail($id);
        return view('admin.raw_materials.edit', compact('rowMaterial'));
    }


    public function update(RawMaterialCreateRequest $request, RowMaterial $rowMaterial)
    {
        $data = $request->validated();
        if ($data['name'] !== $rowMaterial->name) {
            $data['slug'] = RowMaterial::generateUniqueSlug($data['name']);
        }
        $rowMaterial->update($data);
        return redirect()->route('row_materials.index');
    }

    public function destroy(RowMaterial $rowMaterial)
    {
        $rowMaterial->delete();
        return redirect()->route('row_materials.index');
    }
}


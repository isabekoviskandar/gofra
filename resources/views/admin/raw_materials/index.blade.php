@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Raw Materials</h2>
        <a href="{{ route('row_materials.create') }}" class="btn btn-primary">Add New</a>
        <table class="table mt-3">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rowMaterials as $material)
                <tr>
                    <td>{{$material->id}}</td>
                    <td>{{ $material->name }}</td>
                    <td>{{ $material->slug }}</td>
                    <td>
                        <a href="{{ route('row_materials.edit', $material->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        {{-- <form action="{{ route('row_materials.destroy', $material->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

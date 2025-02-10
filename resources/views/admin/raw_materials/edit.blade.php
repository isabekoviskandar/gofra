@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Raw Material</h2>
        <form action="{{ route('row_materials.update', $rowMaterial->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="{{ old('name', $rowMaterial->name) }}" 
                       class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

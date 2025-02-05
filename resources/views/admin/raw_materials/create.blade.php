@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Raw Material</h2>
        <form action="{{ route('row_materials.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>

    </div>
@endsection

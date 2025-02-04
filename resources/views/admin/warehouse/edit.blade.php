@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Warehouse</h2>
        <form action="{{ route('warehouses.update', $warehouse->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="user_id">Select User:</label>
                <select name="user_id" class="form-control" required>
                    <option value="">-- Select User --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $warehouse->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Warehouse Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $warehouse->name }}" required>
            </div>

            <div class="form-group">
                <label for="is_active">Is Active:</label>
                <input type="checkbox" name="is_active" value="1" {{ $warehouse->is_active ? 'checked' : '' }}>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

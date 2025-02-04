@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Warehouse</h2>
        <form action="{{ route('warehouses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">Select User:</label>
                <select name="user_id" class="form-control" required>
                    <option value="">-- Select User --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Warehouse Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection

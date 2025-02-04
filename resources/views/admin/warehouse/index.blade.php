@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Warehouses</h2>
        <a href="{{ route('warehouses.create') }}" class="btn btn-primary">Add Warehouse</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Is active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($warehouses as $warehouse)
                    <tr>
                        <td>{{ $warehouse->id }}</td>
                        <td>{{ $warehouse->user->name }}</td>
                        <td>{{ $warehouse->name }}</td>
                        <td>{{$warehouse->is_active ? 'active' : 'inactive'}}</td>
                        <td>
                            <a href="{{ route('warehouses.show', $warehouse->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('warehouses.edit', $warehouse->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('warehouses.destroy', $warehouse->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

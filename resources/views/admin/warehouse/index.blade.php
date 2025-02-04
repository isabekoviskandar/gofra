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

    <style>
        .container {
            margin-top: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .table {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background: #007bff;
            color: #fff;
            text-align: center;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .btn {
            border-radius: 5px;
            padding: 5px 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-sm {
            font-size: 14px;
            margin: 2px;
        }

        form {
            display: inline;
        }

        @media (max-width: 768px) {
            .table th, .table td {
                font-size: 14px;
            }
        }
    </style>
@endsection

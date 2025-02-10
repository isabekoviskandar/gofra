@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="text-primary">Machines</h1>
            <a href="{{ route('machines.create') }}" class="btn btn-success">+ Create Machine</a>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($machines as $machine)
                            <tr>
                                <td>{{$machine->id}}</td>
                                <td>{{ $machine->name }}</td>
                                <td>
                                    <span class="badge {{ $machine->status === 'Active' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $machine->status ?? 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('machines.edit', $machine->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('machines.destroy', $machine->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this machine?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

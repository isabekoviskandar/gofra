@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Workers List</h3>
            <a href="{{ route('workers.create') }}" class="btn btn-primary btn-sm float-right">Create worker</a>
        </div>

        <div class="card-body">
            @if (session('create'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    {{ session('create') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('delete') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('update'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('update') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Section</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Salary</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($workers as $worker)
                            <tr>
                                <th>{{ $worker->id }}</th>
                                <td>{{ $worker->user->name }}</td>
                                <td>{{ $worker->section->name }}</td>
                                <td>{{ $worker->phone }}</td>
                                <td>{{ $worker->address }}</td>
                                <td>{{ number_format($worker->salary) }} ({{ ucfirst($worker->salary_type) }})</td>
                                <td>
                                    <a href="{{ route('workers.edit', $worker->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('workers.destroy', $worker->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $workers->links() }}
            </div>
        </div>
    </div>
@endsection

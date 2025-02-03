@extends('layouts.app')

@section('content')
    <div class="card mt-4 shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0">Permissions List</h3>
        </div>

        <div class="card-body">
            @if (session('update'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('update') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Key</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Group</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <th>{{ $permission->id }}</th>
                                <td>{{ $permission->key }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <form action="{{ route('permissions.status', $permission->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" value="{{ $permission->id }}">
                                        <input type="hidden" name="active" value="{{ $permission->status ? 0 : 1 }}">
                                        <button class="btn btn-sm {{ $permission->status ? 'btn-success' : 'btn-danger' }}">
                                            <i class="fas {{ $permission->status ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                            {{ $permission->status ? 'Active' : 'Inactive' }}
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $permission->group->name }}</td>
                                <td>
                                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $permissions->links() }}
            </div>
        </div>
    </div>
@endsection

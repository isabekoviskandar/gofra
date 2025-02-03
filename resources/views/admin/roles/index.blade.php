@extends('layouts.app')

@section('content')
    <div class="card mt-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0">Roles List</h3>
            <a href="{{ route('roles.create') }}" class="btn btn-secondary btn-sm float-right">
                <i class="fas fa-plus"></i> Create Role
            </a>
        </div>

        <div class="card-body">
            <!-- Flash Messages -->
            @if (session('create'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
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

            <!-- Roles Table -->
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Permissions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <form action="{{ route('roles.status', $role->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        @if ($role->status == 1)
                                            <input type="hidden" name="id" value="{{ $role->id }}">
                                            <input type="hidden" name="active" value="0">
                                            <button class="badge bg-success border-0 py-2 px-3">Active</button>
                                        @else
                                            <input type="hidden" name="id" value="{{ $role->id }}">
                                            <input type="hidden" name="active" value="1">
                                            <button class="badge bg-danger border-0 py-2 px-3">Inactive</button>
                                        @endif
                                    </form>
                                </td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#permissionsModal{{ $role->id }}">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                </td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Permissions Modal -->
                            <div class="modal fade" id="permissionsModal{{ $role->id }}" tabindex="-1"
                                aria-labelledby="permissionsModalLabel{{ $role->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="permissionsModalLabel{{ $role->id }}">
                                                Permissions for Role: {{ $role->name }}
                                            </h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="accordion" id="permissionsAccordion{{ $role->id }}">
                                                @foreach (\App\Models\Group::with('permissions')->get() as $group)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="heading{{ $group->id }}">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{ $role->id }}-{{ $group->id }}"
                                                                aria-expanded="false"
                                                                aria-controls="collapse{{ $role->id }}-{{ $group->id }}">
                                                                {{ $group->name }}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{ $role->id }}-{{ $group->id }}"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="heading{{ $group->id }}"
                                                            data-bs-parent="#permissionsAccordion{{ $role->id }}">
                                                            <div class="accordion-body">
                                                                @foreach ($group->permissions as $permission)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            disabled
                                                                            @if ($role->permissions->contains('id', $permission->id)) checked @endif>
                                                                        <label class="form-check-label">
                                                                            {{ $permission->name }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $roles->links() }}
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="card mt-4 shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0">Groups List</h3>
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
                            <th>Name</th>
                            <th>Status</th>
                            <th>Permissions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                            <tr>
                                <th>{{ $group->id }}</th>
                                <td>{{ $group->name }}</td>
                                <td>
                                    <form action="{{ route('groups.status', $group->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" value="{{ $group->id }}">
                                        <input type="hidden" name="active" value="{{ $group->status ? 0 : 1 }}">
                                        <button class="btn btn-sm {{ $group->status ? 'btn-success' : 'btn-danger' }}">
                                            <i class="fas {{ $group->status ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                            {{ $group->status ? 'Active' : 'Inactive' }}
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#permissionsModal{{ $group->id }}">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal for Permissions -->
                            <div class="modal fade" id="permissionsModal{{ $group->id }}" tabindex="-1"
                                aria-labelledby="permissionsModalLabel{{ $group->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-secondary text-white">
                                            <h5 class="modal-title" id="permissionsModalLabel{{ $group->id }}">
                                                Permissions for: <strong>{{ $group->name }}</strong>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="list-group">
                                                @foreach (\App\Models\Permission::where('group_id', $group->id)->get() as $permission)
                                                    <li class="list-group-item">
                                                        <i class="fas fa-lock"></i> {{ $permission->name }}
                                                    </li>
                                                @endforeach
                                            </ul>
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

            {{-- <div class="d-flex justify-content-center mt-3">
                {{ $groups->links() }}
            </div> --}}
        </div>
    </div>
@endsection

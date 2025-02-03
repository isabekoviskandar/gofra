@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Create Section</h3>
        </div>

        <div class="card-body">
            @if (session('create'))
                <div class="alert alert-success">{{ session('create') }}</div>
            @endif

            <form action="{{ route('sections.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Section Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create Section</button>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Edit Machine</h1>

    <form action="{{ route('machines.update', $machine->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $machine->name }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="{{ $machine->status }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection

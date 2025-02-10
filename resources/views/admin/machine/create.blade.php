@extends('layouts.app')

@section('content')
    <h1>Create Machine</h1>

    <form action="{{ route('machines.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection

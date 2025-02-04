@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Warehouse Details</h2>
        <p><strong>ID:</strong> {{ $warehouse->id }}</p>
        <p><strong>User ID:</strong> {{ $warehouse->user_id }}</p>
        <p><strong>Name:</strong> {{ $warehouse->name }}</p>
        <a href="{{ route('warehouses.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection

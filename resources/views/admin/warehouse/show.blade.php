@extends('layouts.app')

@section('content')
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Materials List</h3>
        <a href="{{ route('warehouses.index') }}" class="btn btn-info btn-sm float-right">Back</a>
    </div>

    <div class="card-body">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session('update'))
            <div class="alert alert-info alert-dismissible fade show">
                {{ session('update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <table class="table table-bordered table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity & Unit</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sklads as $sklad)
                    <tr>
                        <td>{{ $sklad->id }}</td>
                        <td>{{ $sklad->row_material->name }}</td>
                        <td>{{ number_format($sklad->row_material->price) }} so'm</td>
                        <td>{{ number_format($sklad->value) }} {{ $sklad->row_material->unit }}</td>
                        <td>{{ number_format($sklad->row_material->price * $sklad->value) }}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                                    data-bs-target="#transferModal{{ $sklad->id }}">
                                Transfer
                            </button>

                            <div class="modal fade" id="transferModal{{ $sklad->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Transfer Material</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- <form action="{{ route('warehouses.transfer') }}" method="POST"> --}}
                                                @csrf
                                                <input type="hidden" name="material_id" value="{{ $sklad->id }}">
                                                <input type="hidden" name="real" value="{{ $sklad->warehouse_id }}">

                                                <div class="mb-3">
                                                    <label>Select Warehouse</label>
                                                    <select name="warehouse_id" class="form-control" required>
                                                        @foreach ($warehouses as $warehouse)
                                                            <option value="{{ $warehouse->id }}">
                                                                {{ $warehouse->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Quantity</label>
                                                    <input type="number" name="quantity" class="form-control" 
                                                           min="1" max="{{ $sklad->value }}" required>
                                                </div>

                                                <button type="submit" class="btn btn-success">Transfer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
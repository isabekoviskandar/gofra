@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Row Invoice</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('row_invoices.update', $row_invoice->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group mb-3">
                    <label for="invoice_id">Invoice</label>
                    <select name="invoice_id" id="invoice_id" class="form-control @error('invoice_id') is-invalid @enderror">
                        <option value="">Select Invoice</option>
                        @foreach($invoices as $invoice)
                            <option value="{{ $invoice->id }}" 
                                {{ (old('invoice_id') ?? $row_invoice->invoice_id) == $invoice->id ? 'selected' : '' }}>
                                {{ $invoice->id }}
                            </option>
                        @endforeach
                    </select>
                    @error('invoice_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="row_material_id">Row Material</label>
                    <select name="row_material_id" id="row_material_id" class="form-control @error('row_material_id') is-invalid @enderror">
                        <option value="">Select Material</option>
                        @foreach($row_materials as $material)
                            <option value="{{ $material->id }}" 
                                {{ (old('row_material_id') ?? $row_invoice->row_material_id) == $material->id ? 'selected' : '' }}>
                                {{ $material->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('row_material_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="unit">Unit</label>
                    <input type="text" name="unit" id="unit" class="form-control @error('unit') is-invalid @enderror" 
                           value="{{ old('unit') ?? $row_invoice->unit }}">
                    @error('unit')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" 
                           value="{{ old('quantity') ?? $row_invoice->quantity }}">
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="price">Price</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" 
                           value="{{ old('price') ?? $row_invoice->price }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('row_invoices.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
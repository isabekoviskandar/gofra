@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit Invoice</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Company Name:</label>
                        <input type="text" name="company_name" class="form-control" value="{{ $invoice->company_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date:</label>
                        <input type="date" name="date" class="form-control" value="{{ $invoice->date }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Text:</label>
                        <textarea name="text" class="form-control" rows="4" required>{{ $invoice->text }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

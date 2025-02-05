@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Invoices</h1>
        <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3">Create Invoice</a>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th>Date</th>
                <th>Text</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->company_name }}</td>
                    <td>{{ $invoice->date }}</td>
                    <td>{{ Str::limit($invoice->text, 50) }}</td>
                    <td>
                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this invoice?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

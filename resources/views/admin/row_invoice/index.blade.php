@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="  align-items-center">
            {{-- <h3>Row Invoices</h3> --}}
            <a href="{{ route('row_invoices.create') }}" class="btn btn-primary m-2">Add New</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Invoice</th>
                        <th>Row Material</th>
                        <th>Unit</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Sum</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($row_invoices as $row_invoice)
                    <tr>
                        <td>{{ $row_invoice->invoice->company_name }}</td>
                        <td>{{ $row_invoice->invoice->id }}</td>
                        <td>{{ $row_invoice->row_material->name }}</td>
                        <td>{{ $row_invoice->unit }}</td>
                        <td>{{ $row_invoice->quantity }}</td>
                        <td>{{ $row_invoice->price }}</td>
                        <td>{{ $row_invoice->summ }}</td>
                        <td>
                            <div class="btn-group ml-3">
                                <a href="{{ route('row_invoices.edit', $row_invoice->id) }}" 
                                   class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('row_invoices.destroy', $row_invoice->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger ml-3">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
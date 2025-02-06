@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h5>Invoice Details</h5>
        </div>
        <div class="card-body">
            <div class="invoice-info mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <strong>Company:</strong> {{ $invoice->company_name }}
                    </div>
                    <div class="col-md-4">
                        <strong>Date:</strong> {{ $invoice->date }}
                    </div>
                    <div class="col-md-4">
                        <strong>Total Amount:</strong> 
                        <span class="text-success">{{ $invoice->rowInvoices ? $invoice->rowInvoices->sum('summ') : 0 }}</span>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <strong>Text:</strong> {{ $invoice->text }}
                    </div>
                </div>
            </div>

            <div class="materials-list">
                <h6 class="mt-4">Materials</h6>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Material</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($invoice->rowInvoices)
                                @foreach($invoice->rowInvoices as $row)
                                    <tr>
                                        <td>
                                            @if($row->rowMaterial)
                                                {{ $row->rowMaterial->id }}
                                            @else
                                                <span class="text-danger">N/A</span>
                                            @endif
                                        </td>
                                        <td>{{ $row->unit }}</td>
                                        <td>{{ $row->quantity }}</td>
                                        <td>{{ number_format($row->price, 2) }}</td>
                                        <td>{{ number_format($row->summ, 2) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr class="table-primary">
                                <td colspan="4" class="text-end"><strong>Grand Total:</strong></td>
                                <td class="font-weight-bold">{{ number_format($invoice->rowInvoices ? $invoice->rowInvoices->sum('summ') : 0, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
            <div class="mt-3 text-center">
                <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    .invoice-info strong {
        color: #333;
    }
    .invoice-info .row {
        margin-bottom: 10px;
    }
    .invoice-info .col-md-4 {
        font-size: 16px;
    }
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }
    .table-dark th {
        background-color: #343a40;
        color: white;
    }
    .table-striped tbody tr:nth-child(odd) {
        background-color: #f8f9fa;
    }
    .table-bordered td, .table-bordered th {
        border: 1px solid #ddd;
    }
</style>
@endsection

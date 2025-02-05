<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceCreateRequest;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('admin.invoices.index' , compact('invoices'));
    }

    public function  create()
    {
        return view('admin.invoices.create');
    }

    public function store(InvoiceCreateRequest $request)
    {
        $invoice = Invoice::create($request->validated());
        return redirect()->route('invoices.index');
    }

    public function edit(Invoice $invoice)
    {
        $invoice = Invoice::findOrFail($invoice->id);
        return view('admin.invoices.edit', compact('invoice'));
    }

    public function update(InvoiceCreateRequest $request, Invoice $invoice)
    {
        $invoice->update($request->validated());
        return redirect()->route('invoices.index');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice = Invoice::findOrFail($invoice->id);
        $invoice->delete();
        return redirect()->route('invoices.index');
    }
}

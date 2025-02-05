<?php

namespace App\Http\Controllers;

use App\Http\Requests\RowInvoiceCreateRequest;
use App\Http\Requests\RowInvoiceEditRequest;
use App\Models\Invoice;
use App\Models\RowInvoice;
use App\Models\RowMaterial;
use Illuminate\Http\Request;

class RowInvoiceController extends Controller
{
    public function index()
    {
        $row_invoices = RowInvoice::all();
        return view('admin.row_invoice.index', compact('row_invoices'));
    }

    public function create()
    {
        $invoices = Invoice::all();
        $row_materials = RowMaterial::all();
        return view('admin.row_invoice.create', compact('invoices', 'row_materials'));
    }

    public function store(RowInvoiceCreateRequest $request)
    {
        $validated = $request->validated();

        $validated['summ'] = $validated['quantity'] * $validated['price'];

        RowInvoice::create($validated);

        return redirect()->route('row_invoices.index');
    }

    public function edit($id)
    {
        $row_invoice = RowInvoice::findOrFail($id);
        $invoices = Invoice::all();
        $row_materials = RowMaterial::all();

        return view('admin.row_invoice.edit', compact('row_invoice', 'invoices', 'row_materials'));
    }

    public function update(RowInvoiceEditRequest $request, RowInvoice $rowInvoice)
    {
        $validated = $request->validated();

        $validated['summ'] = $validated['quantity'] * $validated['price'];

        $rowInvoice->update($validated);

        return redirect()->route('row_invoices.index');
    }

    public function destroy($id)
    {
        $rowInvoice = RowInvoice::findOrFail($id);
        $rowInvoice->delete();

        return redirect()->route('row_invoices.index')->with('success', 'Row invoice deleted successfully');
    }
}

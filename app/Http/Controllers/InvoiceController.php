<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceCreateRequest;
use App\Models\Invoice;
use App\Models\RowInvoice;
use App\Models\RowMaterial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('admin.invoices.index', compact('invoices'));
    }

    public function create()
    {
        $rowMaterials = RowMaterial::all();
        return view('admin.invoices.create', compact('rowMaterials'));
    }

    public function store(InvoiceCreateRequest $request)
    {
        DB::transaction(function () use ($request) {
            $invoice = Invoice::create([
                'company_name' => $request->company_name,
                'date' => $request->date,
                'text' => $request->text
            ]);

            foreach ($request->row_material_id as $key => $materialId) {
                RowInvoice::create([
                    'invoice_id' => $invoice->id,
                    'row_material_id' => $materialId,
                    'unit' => $request->unit[$key],
                    'quantity' => $request->quantity[$key],
                    'price' => $request->price[$key],
                    'summ' => $request->summ[$key]
                ]);
            }
        });

        return redirect()->route('invoices.index');
    }

    public function show(Invoice $invoice)
    {
        $invoice->load(['rowInvoices.row_material']);
        return view('admin.invoices.show', compact('invoice'));
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

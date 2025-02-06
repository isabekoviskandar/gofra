@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Create Invoice</h1>
        <div class="card">
            <div class="card-body">
                {{-- resources/views/admin/invoices/create.blade.php --}}
                <form action="{{ route('invoices.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label>Company Name</label>
                        <input type="text" name="company_name" required class="form-control">
                    </div>

                    <div class="mb-4">
                        <label>Date</label>
                        <input type="date" name="date" required class="form-control">
                    </div>

                    <div class="mb-4">
                        <label>Text</label>
                        <textarea name="text" required class="form-control"></textarea>
                    </div>

                    <div id="materials">
                        <div class="row mb-3">
                            <div class="col">
                                <select name="row_material_id[]" required class="form-control">
                                    @foreach ($rowMaterials as $material)
                                        <option value="{{ $material->id }}">{{ $material->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" name="unit[]" placeholder="Unit" required class="form-control">
                            </div>
                            <div class="col">
                                <input type="number" name="quantity[]" placeholder="Quantity" required
                                    class="form-control">
                            </div>
                            <div class="col">
                                <input type="number" step="0.01" name="price[]" placeholder="Price" required
                                    class="form-control">
                            </div>
                            <div class="col">
                                <input type="number" step="0.01" name="summ[]" readonly class="form-control">
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-danger remove-row">Remove</button>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="add-material" class="btn btn-secondary">Add Material</button>
                    <button type="submit" class="btn btn-primary">Save Invoice</button>
                </form>

                <script>
                    document.getElementById('add-material').addEventListener('click', function() {
                        const template = document.querySelector('#materials .row').cloneNode(true);
                        template.querySelectorAll('input').forEach(input => input.value = '');
                        document.getElementById('materials').appendChild(template);
                    });

                    document.getElementById('materials').addEventListener('click', function(e) {
                        if (e.target.classList.contains('remove-row')) {
                            e.target.closest('.row').remove();
                        }
                    });

                    document.getElementById('materials').addEventListener('input', function(e) {
                        if (e.target.name === 'quantity[]' || e.target.name === 'price[]') {
                            const row = e.target.closest('.row');
                            const quantity = row.querySelector('[name="quantity[]"]').value;
                            const price = row.querySelector('[name="price[]"]').value;
                            row.querySelector('[name="summ[]"]').value = (quantity * price).toFixed(2);
                        }
                    });
                </script>
            </div>
        </div>
    </div>
@endsection

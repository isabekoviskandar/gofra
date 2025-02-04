@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Warehouse</h2>
        <form action="{{ route('warehouses.update', $warehouse->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="user_id">Select User:</label>
                <select name="user_id" class="form-control" required>
                    <option value="">-- Select User --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $warehouse->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Warehouse Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $warehouse->name }}" required>
            </div>

            <div class="form-group">
                <label for="is_active">Is Active:</label>
                <select name="is_active" class="form-control">
                    <option value="">Select activity</option>
                    <option value="1" {{ $warehouse->is_active == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $warehouse->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        select,
        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
        }
    </style>
@endsection

@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Edit Worker: {{ $worker->name }}</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('workers.update', $worker->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    <select class="form-select" name="user_id" id="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $worker->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="section_id" class="form-label">Section</label>
                    <select class="form-select" name="section_id" id="section_id">
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}" {{ $worker->section_id == $section->id ? 'selected' : '' }}>
                                {{ $section->name }}</option>
                        @endforeach
                    </select>
                    @error('section_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                        id="address" value="{{ old('address', $worker->address) }}">
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                        id="phone" value="{{ old('phone', $worker->phone) }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="text" class="form-control @error('salary') is-invalid @enderror" name="salary"
                        id="salary" value="{{ old('salary', $worker->salary) }}">
                    @error('salary')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="salary_type" class="form-label">Salary Type</label>
                    <select name="salary_type" class="form-control">
                        <option value="hourly" {{ $worker->salary_type == 'hourly' ? 'selected' : '' }}>Hourly</option>
                        <option value="workly" {{ $worker->salary_type == 'workly' ? 'selected' : '' }}>Workly</option>
                    </select>
                    @error('salary_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>  

                <button type="submit" class="btn btn-primary">Update Section</button>
            </form>
        </div>
    </div>
@endsection

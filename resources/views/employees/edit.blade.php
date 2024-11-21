@extends('layouts.template')

@section('title', 'Edit Employee')

@section('content')
    <div class="container">
        <h1>Edit Employee</h1>

        <form action="{{ route('employees.update', $employee) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="staff" {{ $employee->role == 'staff' ? 'selected' : '' }}>Staff</option>
                    <option value="office boy" {{ $employee->role == 'office boy' ? 'selected' : '' }}>Office Boy</option>
                    <option value="doktor" {{ $employee->role == 'doktor' ? 'selected' : '' }}>Doktor</option>
                    <option value="frontliner" {{ $employee->role == 'frontliner' ? 'selected' : '' }}>Frontliner</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="male" {{ $employee->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $employee->gender == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" required>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $employee->phone_number }}" required>
            </div>

            <div class="mb-3">
                <label for="hired_date" class="form-label">Hired Date</label>
                <input type="date" class="form-control" id="hired_date" name="hired_date" value="{{ $employee->hired_date }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

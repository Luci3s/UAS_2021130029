@extends('layouts.template')

@section('title', 'Add Employee')

@section('content')
    <div class="container">
        <h1>Add Employee</h1>

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="staff">Staff</option>
                    <option value="office boy">Office Boy</option>
                    <option value="doktor">Doktor</option>
                    <option value="frontliner">Frontliner</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>

            <div class="mb-3">
                <label for="hired_date" class="form-label">Hired Date</label>
                <input type="date" class="form-control" id="hired_date" name="hired_date" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

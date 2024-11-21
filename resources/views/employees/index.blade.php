@extends('layouts.template')

@section('title', 'Employee List')

@section('content')
    <div class="container">
        <h1>Employee List</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add New Employee</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Hired Date</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->role }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone_number }}</td>
                        <td>{{ $employee->hired_date }}</td>
                        <td>{{ $employee->gender }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

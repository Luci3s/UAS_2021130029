@extends('layouts.template')

@section('title', 'Employee Details')

@section('content')
<div class="container">
    <h1 class="my-4">Employee Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $employee->name }}</h5>
            <p class="card-text"><strong>Role:</strong> {{ $employee->role }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
            <p class="card-text"><strong>Phone Number:</strong> {{ $employee->phone_number }}</p>
            <p class="card-text"><strong>Hired Date:</strong> {{ $employee->hired_date }}</p>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection

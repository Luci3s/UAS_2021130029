@extends('layouts.template')

@section('title', 'Donations List')

@section('content')
<div class="container">
    <h1>Donations</h1>
    <a href="{{ route('donations.create') }}" class="btn btn-primary mb-3">Add Donation</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donations as $donation)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $donation->name }}</td>
                <td>{{ $donation->email }}</td>
                <td>{{ $donation->phone_number }}</td>
                <td>{{ $donation->address }}</td>
                <td>
                    <a href="{{ route('donations.show', $donation->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('donations.edit', $donation->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('donations.destroy', $donation->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

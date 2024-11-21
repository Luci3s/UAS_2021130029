@extends('layouts.template')

@section('title', 'Adopters List')

@section('content')
<div class="container">
    <h1 class="my-4">Adopters List</h1>
    <a href="{{ route('adopters.create') }}" class="btn btn-primary mb-3">Add New Adopter</a>

    @if($adopters->isEmpty())
        <p>No adopters found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($adopters as $adopter)
                    <tr>
                        <td>{{ $adopter->id }}</td>
                        <td>{{ $adopter->name }}</td>
                        <td>{{ $adopter->email }}</td>
                        <td>{{ $adopter->phone_number }}</td>
                        <td>{{ $adopter->address }}</td>
                        <td>
                            <a href="{{ route('adopters.show', $adopter->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('adopters.edit', $adopter->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('adopters.destroy', $adopter->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

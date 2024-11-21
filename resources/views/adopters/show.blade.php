@extends('layouts.template')

@section('title', 'Adopter Details')

@section('content')
<div class="container">
    <h1 class="my-4">Adopter Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $adopter->name }}</h5>
            <p><strong>Email:</strong> {{ $adopter->email }}</p>
            <p><strong>Phone Number:</strong> {{ $adopter->phone_number }}</p>
            <p><strong>Address:</strong> {{ $adopter->address }}</p>
            <a href="{{ route('adopters.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('adopters.edit', $adopter->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection

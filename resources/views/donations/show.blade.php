@extends('layouts.template')

@section('title', 'Donation Details')

@section('content')
<div class="container">
    <h1>Donation Details</h1>
    <p><strong>Name:</strong> {{ $donation->name }}</p>
    <p><strong>Email:</strong> {{ $donation->email }}</p>
    <p><strong>Phone Number:</strong> {{ $donation->phone_number }}</p>
    <p><strong>Address:</strong> {{ $donation->address }}</p>
    <a href="{{ route('donations.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection

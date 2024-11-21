@extends('layouts.template')

@section('title', 'Edit Adopter')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Adopter</h1>

    <form action="{{ route('adopters.update', $adopter->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $adopter->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $adopter->email }}" required>
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $adopter->phone_number }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" required>{{ $adopter->address }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection

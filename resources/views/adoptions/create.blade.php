@extends('layouts.template')

@section('title', 'Adopt an Animal')

@section('content')
<div class="container">
    <h1>Adopt an Animal</h1>
    <form action="{{ route('adoption.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="adopter_id" class="form-label">Adopter</label>
            <select name="adopter_id" id="adopter_id" class="form-control" required>
                <option value="">-- Select Adopter --</option>
                @foreach($adopters as $adopter)
                <option value="{{ $adopter->id }}">{{ $adopter->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="animal_id" class="form-label">Animal</label>
            <select name="animal_id" id="animal_id" class="form-control" required>
                <option value="">-- Select Animal --</option>
                @foreach($animals as $animal)
                <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="adopted_at" class="form-label">Adopted Date</label>
            <input type="date" name="adopted_at" id="adopted_at" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Adopt Animal</button>
    </form>
</div>
@endsection

@extends('layouts.template')

@section('title', $animal->name)

@section('content')
<div class="container my-4">
    <div class="animal-details">
        <h1 class="display-5 fw-bold">{{ $animal->name }}</h1>
        <p class="text-muted">Last updated: {{ $animal->updated_at->format('F d, Y') }}</p>

    @if($animal->image_url)
        <img src="{{ asset(str_replace('public/', '/storage/', $animal->image_url)) }}" alt="{{ $animal->name }}" class="img-fluid">
    @else
        <p>No image available for this animal.</p>
    @endif

        <div class="details-section my-4">
            <h3>Details</h3>
            <ul>
                <li><strong>Species:</strong> {{ $animal->species }}</li>
                <li><strong>Breed:</strong> {{ $animal->breed }}</li>
                <li><strong>Age:</strong> {{ $animal->age }} years</li>
                <li><strong>Gender:</strong> {{ ucfirst($animal->gender) }}</li>
                <li><strong>Status:</strong> {{ $animal->is_adopted ? 'Adopted' : 'Available for Adoption' }}</li>
            </ul>
        </div>

        @if ($animal->description)
            <div class="description-section my-4">
                <h3>Description</h3>
                <p>{{ $animal->description }}</p>
            </div>
        @endif
    </div>
</div>
@endsection

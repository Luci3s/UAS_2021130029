@extends('layouts.template')

@section('title', 'Animal Shelter')

@section('content')
{{-- Animals Card --}}
    <div class="row mb-2">
        @forelse ($animals as $animal)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0">{{ $animal->name }}</h3>
                        <div class="mb-1 text-muted">{{ $animal->updated_at->format('M d, Y') }}</div>
                        <p class="mb-auto">Species: {{ $animal->species }}</p>
                        <p class="mb-auto">Breed: {{ $animal->breed }}</p>
                        <p class="mb-auto">Age: {{ $animal->age }} years</p>
                        <a href="{{ route('animals.show', $animal) }}" class="stretched-link">View Details</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        @if ($animal->image_url)
                        <div style="width: 200px; height: 250px; overflow: hidden;">
                            <img src="{{ asset(str_replace('public/', '/storage/', $animal->image_url)) }}" alt="{{ $animal->name }}" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        @else
                            <img src="https://via.placeholder.com/200x250" alt="Placeholder image" width="200" height="250">
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h2 class="card-text mb-auto">No animals available for adoption.</h2>
                    </div>
                </div>
            </div>
        @endforelse

        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {{ $animals->links() }}
        </div>
    </div>
@endsection

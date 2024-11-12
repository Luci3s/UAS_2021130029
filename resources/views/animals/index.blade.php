@extends('layouts.template')

@section('content')
<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>All Animals</h1>
    <!-- Tombol tambah hewan baru -->
    <a href="{{ route('animals.create') }}" class="btn btn-primary mb-3">Add New Animal</a>
</div>

<div class="container mt-5">
    <!-- Pesan sukses jika ada -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel daftar hewan -->
    <table class="table table-bordered mb-5">
        <thead>
            <tr class="table-success">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Species</th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                <th scope="col">Adoption Status</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($animals as $animal)
                <tr>
                    <th scope="row">{{ $animal->id }}</th>
                    <td>
                        <a href="{{ route('animals.show', $animal) }}">{{ $animal->name }}</a>
                    </td>
                    <td>{{ $animal->species }}</td>
                    <td>{{ ucfirst($animal->gender) }}</td>
                    <td>{{ $animal->age }} years</td>
                    <td>{{ $animal->is_adopted ? 'Adopted' : 'Available' }}</td>
                    <td>{{ $animal->created_at->format('Y-m-d') }}</td>
                    <td>{{ $animal->updated_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('animals.edit', $animal) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('animals.destroy', $animal) }}" method="POST" class="d-inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">No animals found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

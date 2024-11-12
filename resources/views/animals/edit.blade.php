@extends('layouts.template')

@section('title', 'Update Animal')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Update Animal</h1>
    </div>

    <!-- Menampilkan pesan error jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <!-- Form untuk update data hewan -->
            <form action="{{ route('animals.update', $animal) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <!-- Nama Hewan -->
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $animal->name) }}">
                </div>

                <!-- Gambar Hewan -->
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="image_url" class="form-label">Image</label>
                    <input class="form-control" type="file" id="image_url" name="image_url">
                    @if ($animal->image_url)
                        <img src="{{ asset('storage/' . $animal->image_url) }}" class="mt-3" style="max-width: 400px;">
                    @endif
                </div>

                <!-- Spesies -->
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="species" class="form-label">Species</label>
                    <input type="text" class="form-control" id="species" name="species" value="{{ old('species', $animal->species) }}">
                </div>

                <!-- Ras -->
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="breed" class="form-label">Breed</label>
                    <input type="text" class="form-control" id="breed" name="breed" value="{{ old('breed', $animal->breed) }}">
                </div>

                <!-- Umur -->
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="age" class="form-label">Age (years)</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $animal->age) }}">
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="male" {{ old('gender', $animal->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $animal->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <!-- Deskripsi -->
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" rows="5" name="description">{{ old('description', $animal->description) }}</textarea>
                </div>

                <!-- Status Adopsi -->
                <div class="form-check form-switch mb-3">
                    <label class="form-check-label" for="is_adopted">Adopted?</label>
                    <input class="form-check-input" type="checkbox" id="is_adopted" name="is_adopted" {{ $animal->is_adopted ? 'checked' : '' }}>
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>


@endsection

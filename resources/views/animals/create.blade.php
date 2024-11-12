@extends('layouts.template')

@section('title', 'Create Informasi Hewan')

@section('content')
<div class="container">
    <h1 class="my-4">Add New Animal</h1>

    <!-- Tampilkan error global jika ada -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk menambahkan hewan baru -->
    <form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Animal Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="species" class="form-label">Species</label>
            <select class="form-select" id="species" name="species" required>
                <option selected disabled>Select species</option>
                <option value="Dog" {{ old('species') == 'Dog' ? 'selected' : '' }}>Dog</option>
                <option value="Cat" {{ old('species') == 'Cat' ? 'selected' : '' }}>Cat</option>
                <option value="Rabbit" {{ old('species') == 'Rabbit' ? 'selected' : '' }}>Rabbit</option>
            </select>
            @error('species')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="breed" class="form-label">Breed</label>
            <select class="form-select" id="breed" name="breed">
                <option selected disabled>Select breed</option>
                <optgroup label="Dog">
                    <option value="Labrador" {{ old('breed') == 'Labrador' ? 'selected' : '' }}>Labrador</option>
                    <option value="Bulldog" {{ old('breed') == 'Bulldog' ? 'selected' : '' }}>Bulldog</option>
                    <option value="Poodle" {{ old('breed') == 'Poodle' ? 'selected' : '' }}>Poodle</option>
                </optgroup>
                <optgroup label="Cat">
                    <option value="Siamese" {{ old('breed') == 'Siamese' ? 'selected' : '' }}>Siamese</option>
                    <option value="Persian" {{ old('breed') == 'Persian' ? 'selected' : '' }}>Persian</option>
                    <option value="Maine Coon" {{ old('breed') == 'Maine Coon' ? 'selected' : '' }}>Maine Coon</option>
                </optgroup>
                <optgroup label="Rabbit">
                    <option value="Angora" {{ old('breed') == 'Angora' ? 'selected' : '' }}>Angora</option>
                    <option value="Dutch" {{ old('breed') == 'Dutch' ? 'selected' : '' }}>Dutch</option>
                    <option value="Lionhead" {{ old('breed') == 'Lionhead' ? 'selected' : '' }}>Lionhead</option>
                </optgroup>
            </select>
            @error('breed')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Age (in years)</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}" min="0">
            @error('age')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender" required>
                <option selected disabled>Select gender</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Jantan</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Betina</option>
            </select>
            @error('gender')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (Optional)</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image_url" class="form-label">Animal Image</label>
            <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*">
            @error('image_url')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="is_adopted" name="is_adopted" {{ old('is_adopted') ? 'checked' : '' }}>
            <label class="form-check-label" for="is_adopted">Is Adopted</label>
        </div>

        <button type="submit" class="btn btn-primary">Add Animal</button>
    </form>
</div>
@endsection

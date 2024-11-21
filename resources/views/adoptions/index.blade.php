@extends('layouts.template')

@section('content')
    <h1>Adoption List</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Adopter Name</th>
                <th>Animal Name</th>
                <th>Species</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adoptions as $adoption)
                <tr>
                    <td>{{ $adoption->adopter->name }}</td>
                    <td>{{ $adoption->animal->name }}</td>
                    <td>{{ $adoption->animal->species }}</td>
                    <td>{{ $adoption->animal->age }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

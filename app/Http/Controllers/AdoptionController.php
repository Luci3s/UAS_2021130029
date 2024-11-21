<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Adopter;
use App\Models\Adoption;
use Illuminate\Support\Facades\DB;

class AdoptionController extends Controller
{
    public function create()
    {
        $adopters = Adopter::all();
        $animals = Animal::all();
        return view('adoptions.create', compact('adopters', 'animals'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'adopter_id' => 'required|exists:adopters,id',
            'animal_id' => 'required|exists:animals,id',
            'adopted_at' => 'required|date',
        ]);

        // Menyimpan data adopsi ke tabel relasi
        $adopter = Adopter::find($validated['adopter_id']);
        $adopter->animals()->attach($validated['animal_id'], ['adopted_at' => $validated['adopted_at']]);

        return redirect()->route('adoptions.index')->with('success', 'Animal adopted successfully!');


    }

    public function index()
    {
        // Mengambil semua adopsi dengan informasi adopter dan animal
        $adoptions = Adoption::with('adopter', 'animal')->get();

        // Mengirim data ke view
        return view('adoptions.index', compact('adoptions'));
    }
}

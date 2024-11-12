<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $animals = Animal::paginate(6); // Menampilkan 6 hewan per halaman

        // // Kirim data ke view 'animals.index'
        // return view('animals.index', compact('animals'));

        $animals = Animal::all(); // Mengambil semua data dari tabel 'animals'
        return view('animals.index', compact('animals')); // Mengirimkan data ke view

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input awal
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'species' => 'required|string|max:50',
            'breed' => 'nullable|string|max:50',
            'age' => 'nullable|integer|min:0',
            'gender' => 'required|string|in:male,female',
            'description' => 'nullable|string',
            'is_adopted' => 'boolean',
        ]);

        // Validasi dan simpan gambar jika ada
        if ($request->hasFile('image_url')) {
            $request->validate([
                'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Upload gambar dan dapatkan path gambar yang diupload
            $imagePath = $request->file('image_url')->store('public/animals');
            $validated['image_url'] = $imagePath;
        }

        // Buat hewan baru
        $animal = Animal::create([
            'name' => $validated['name'],
            'species' => $validated['species'],
            'breed' => $validated['breed'] ?? null,
            'age' => $validated['age'] ?? null,
            'gender' => $validated['gender'],
            'description' => $validated['description'] ?? null,
            'image_url' => $validated['image_url'] ?? null,
            'is_adopted' => $validated['is_adopted'] ?? false,
        ]);

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('animals.index')->with('success', 'Animal added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {

        // Kirim data ke view 'animals.show'
        return view('animals.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return view('animals.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'species' => 'required|string',
            'breed' => 'required|string',
            'age' => 'required|integer|min:0',
            'gender' => 'required|string|in:male,female',
            'description' => 'nullable|string',
        ]);

        // Simpan gambar baru jika ada
        if ($request->hasFile('image_url')) {
            // Validasi gambar
            $request->validate([
                'image_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Upload gambar dan dapatkan path
            $imagePath = $request->file('image_url')->store('public/animals');

            // Hapus gambar lama jika ada
            if ($animal->image_url) {
                Storage::delete($animal->image_url);
            }

            $validated['image_url'] = $imagePath;
        }

        // Update data hewan
        $animal->update([
            'name' => $validated['name'],
            'species' => $validated['species'],
            'breed' => $validated['breed'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'description' => $validated['description'] ?? $animal->description,
            'is_adopted' => $request->has('is_adopted'),
            // Jika tidak ada gambar baru, gunakan gambar lama
            'image_url' => $validated['image_url'] ?? $animal->image_url,
        ]);

        return redirect()->route('animals.index')->with('success', 'Animal updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
         // Hapus gambar jika ada
    if ($animal->image_url) {
        Storage::delete($animal->image_url);
        }

        // Hapus data hewan
        $animal->delete();

        return redirect()->route('animals.index')->with('success', 'Animal deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Adopter;
use Illuminate\Http\Request;

class AdopterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data adopter
        $adopters = Adopter::all();

        // Kembalikan view dengan data adopter
        return view('adopters.index', compact('adopters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adopters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:adopters',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        Adopter::create($request->all());
        return redirect()->route('adopters.index')->with('success', 'Adopter created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Adopter $adopter)
    {
        return view('adopters.show', compact('adopter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adopter $adopter)
    {
        return view('adopters.edit', compact('adopter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adopter $adopter)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:adopters,email,' . $adopter->id,
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $adopter->update($request->all());
        return redirect()->route('adopters.index')->with('success', 'Adopter updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adopter $adopter)
    {
        $adopter->delete();
        return redirect()->route('adopters.index')->with('success', 'Adopter deleted successfully.');
    }
}

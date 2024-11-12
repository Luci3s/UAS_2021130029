<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $animals = Animal::latest()->paginate(7);
        return view('landing', compact('animals'));

    //     $animals = Animal::query()->latest()->paginate(7);
    // // Tambahkan ini untuk memastikan variabel terisi
    // dd($animals);
    // return view('landing', compact('animals'));
    }

    public function index()
    {
        $animals = Animal::latest()->paginate(7);
        return view('landing', compact('animals'));
    }
}

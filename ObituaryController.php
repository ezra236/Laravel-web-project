<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obituary;

class ObituaryController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'date_of_death' => 'required|date',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
        ]);

        Obituary::create($validatedData);

        return redirect()->back()->with('success', 'Obituary submitted successfully.');
    }

    public function index()
    {
        $obituaries = Obituary::all();
        return view('view_obituaries', compact('obituaries'));
    }
}

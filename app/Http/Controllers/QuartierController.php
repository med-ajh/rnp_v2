<?php

namespace App\Http\Controllers;

use App\Models\Quartier;
use Illuminate\Http\Request;

class QuartierController extends Controller
{
    public function index()
    {
        $quartiers = Quartier::all();
        return view('quartiers.index', compact('quartiers'));
    }

    public function create()
    {
        return view('quartiers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        Quartier::create($request->all());
        return redirect()->route('quartiers.index')->with('success', 'Quartier created successfully.');
    }

    public function edit(Quartier $quartier)
    {
        return view('quartiers.edit', compact('quartier'));
    }

    public function update(Request $request, Quartier $quartier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $quartier->update($request->all());
        return redirect()->route('quartiers.index')->with('success', 'Quartier updated successfully.');
    }

    public function destroy(Quartier $quartier)
    {
        $quartier->delete();
        return redirect()->route('quartiers.index')->with('success', 'Quartier deleted successfully.');
    }
}

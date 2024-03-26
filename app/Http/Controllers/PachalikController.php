<?php

namespace App\Http\Controllers;

use App\Models\Pachalik;
use Illuminate\Http\Request;

class PachalikController extends Controller
{
    public function index()
    {
        $pachaliks = Pachalik::all();
        return view('pachaliks.index', compact('pachaliks'));
    }

    public function create()
    {
        return view('pachaliks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        Pachalik::create($request->all());
        return redirect()->route('pachaliks.index')->with('success', 'Pachalik created successfully.');
    }

    public function edit(Pachalik $pachalik)
    {
        return view('pachaliks.edit', compact('pachalik'));
    }

    public function update(Request $request, Pachalik $pachalik)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        $pachalik->update($request->all());
        return redirect()->route('pachaliks.index')->with('success', 'Pachalik updated successfully.');
    }

    public function destroy(Pachalik $pachalik)
    {
        $pachalik->delete();
        return redirect()->route('pachaliks.index')->with('success', 'Pachalik deleted successfully.');
    }
}

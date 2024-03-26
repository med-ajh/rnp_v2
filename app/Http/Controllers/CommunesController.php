<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    public function index()
    {
        $communes = Commune::all();
        return view('communes.index', compact('communes'));
    }

    public function create()
    {
        return view('communes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pachalik_id' => 'required|exists:pachaliks,id',
        ]);

        Commune::create($request->all());

        return redirect()->route('communes.index')
            ->with('success', 'Commune created successfully.');
    }

    public function edit(Commune $commune)
    {
        return view('communes.edit', compact('commune'));
    }

    public function update(Request $request, Commune $commune)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pachalik_id' => 'required|exists:pachaliks,id',
        ]);

        $commune->update($request->all());

        return redirect()->route('communes.index')
            ->with('success', 'Commune updated successfully');
    }

    public function destroy(Commune $commune)
    {
        $commune->delete();

        return redirect()->route('communes.index')
            ->with('success', 'Commune deleted successfully');
    }
}

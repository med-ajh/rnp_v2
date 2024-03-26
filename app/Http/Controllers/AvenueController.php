<?php

namespace App\Http\Controllers;

use App\Models\Avenue;
use Illuminate\Http\Request;

class AvenueController extends Controller
{
    public function index()
    {
        $avenues = Avenue::all();
        return view('avenues.index', compact('avenues'));
    }

    public function create()
    {
        return view('avenues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        Avenue::create($request->all());
        return redirect()->route('avenues.index')->with('success', 'Avenue created successfully.');
    }

    public function edit(Avenue $avenue)
    {
        return view('avenues.edit', compact('avenue'));
    }

    public function update(Request $request, Avenue $avenue)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        $avenue->update($request->all());
        return redirect()->route('avenues.index')->with('success', 'Avenue updated successfully.');
    }

    public function destroy(Avenue $avenue)
    {
        $avenue->delete();
        return redirect()->route('avenues.index')->with('success', 'Avenue deleted successfully.');
    }
}

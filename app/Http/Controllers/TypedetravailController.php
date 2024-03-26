<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typedetravail;

class TypedetravailController extends Controller
{
    public function index()
    {
        $typedetravails = Typedetravail::all();
        return view('typedetravails.index', compact('typedetravails'));
    }

    public function create()
    {
        return view('typedetravails.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100', 
        ]);

        Typedetravail::create($request->all());

        return redirect()->route('typedetravails.index')
            ->with('success', 'Typedetravail created successfully.');
    }

    public function show(Typedetravail $typedetravail)
    {
        return view('typedetravails.show', compact('typedetravail'));
    }

    public function edit(Typedetravail $typedetravail)
    {
        return view('typedetravails.edit', compact('typedetravail'));
    }

    public function update(Request $request, Typedetravail $typedetravail)
    {
        $request->validate([
            'nom' => 'required|string|max:100', // Adjust max length if needed
        ]);

        $typedetravail->update($request->all());

        return redirect()->route('typedetravails.index')
            ->with('success', 'Typedetravail updated successfully');
    }

    public function destroy(Typedetravail $typedetravail)
    {
        $typedetravail->delete();

        return redirect()->route('typedetravails.index')
            ->with('success', 'Typedetravail deleted successfully');
    }
}

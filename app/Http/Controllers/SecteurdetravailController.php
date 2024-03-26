<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secteurdetravail;
use App\Models\Typedetravail;

class SecteurdetravailController extends Controller
{
    public function index()
    {
        $secteurs = Secteurdetravail::with('typedetravail')->get();
        return view('secteurs.index', compact('secteurs'));
    }

    public function create()
    {
        $typedetravails = Typedetravail::all();
        return view('secteurs.create', compact('typedetravails'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'typedetravail_id' => 'required|exists:typedetravails,id',
        ]);

        Secteurdetravail::create($request->all());

        return redirect()->route('secteurs.index')->with('success', 'Secteur de travail créé avec succès.');
    }
}

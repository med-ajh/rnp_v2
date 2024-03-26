<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Province;

class ReclamationController extends Controller
{
    public function index()
    {
        $reclamations = Reclamation::all();
        return view('reclamations.index', compact('reclamations'));
    }

    public function create()
    {
        $regions = Region::all();
        $provinces = Province::all();
        return view('reclamations.create', compact('regions', 'provinces'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'nom_prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telephone' => 'required|string|max:20',
            'region_id' => 'required|exists:regions,id',
            'province_id' => 'required|exists:provinces,id',
            'descriptif' => 'required|string',
        ]);

        Reclamation::create([
            'type' => $request->type,
            'titre' => $request->titre,
            'nom_prenom' => $request->nom_prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'region_id' => $request->region_id,
            'province_id' => $request->province_id,
            'descriptif' => $request->descriptif,
            'date_reclamation' => now(),
        ]);

        return redirect()->route('reclamations.index')->with('success', 'Reclamation created successfully.');
    }

    public function show(Reclamation $reclamation)
    {
        return view('reclamations.show', compact('reclamation'));
    }

    public function edit(Reclamation $reclamation)
    {
        return view('reclamations.edit', compact('reclamation'));
    }

    public function update(Request $request, Reclamation $reclamation)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'nom_prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telephone' => 'required|string|max:20',
            'region_id' => 'required|exists:regions,id',
            'province_id' => 'required|exists:provinces,id',
            'descriptif' => 'required|string',
        ]);

        $reclamation->update([
            'titre' => $request->titre,
            'nom_prenom' => $request->nom_prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'region_id' => $request->region_id,
            'province_id' => $request->province_id,
            'descriptif' => $request->descriptif,
        ]);

        return redirect()->route('reclamations.index')->with('success', 'Reclamation updated successfully.');
    }

    public function destroy(Reclamation $reclamation)
    {
        $reclamation->delete();
        return redirect()->route('reclamations.index')->with('success', 'Reclamation deleted successfully.');
    }


    public function filterProvinces(Request $request)
    {
        $regionId = $request->input('region_id');

        if (!empty($regionId)) {
            $region = Region::find($regionId);
            $provinces = $region->provinces()->pluck('name', 'id')->toArray();
            return response()->json($provinces);
        } else {
            return response()->json([]); // Return empty array if region ID is empty
        }
    }



}

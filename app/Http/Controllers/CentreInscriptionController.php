<?php

namespace App\Http\Controllers;

use App\Models\CentreInscription;
use Illuminate\Http\Request;

class CentreInscriptionController extends Controller
{
    public function index()
    {
        $centres = CentreInscription::all();
        return view('centres.index', compact('centres'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'region_id' => 'required',
            'province_id' => 'required',
            'pachalik_id' => 'required',
            'quartier_id' => 'required',
            'avenue_id' => 'required',
        ]);

        CentreInscription::create($validatedData);

    }

    public function show($id)
    {
        $centre = CentreInscription::findOrFail($id);
        return view('centres.show', compact('centre'));
    }

    public function edit($id)
    {
        $centre = CentreInscription::findOrFail($id);
        return view('centres.edit', compact('centre'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'region_id' => 'required',
            'province_id' => 'required',
            'pachalik_id' => 'required',
            'quartier_id' => 'required',
            'avenue_id' => 'required',
        ]);

        $centre = CentreInscription::findOrFail($id);
        $centre->update($validatedData);

    }

    public function destroy($id)
    {
        $centre = CentreInscription::findOrFail($id);
        $centre->delete();

    }

    public function rechercherUneCentreDinscription(Request $request)
{
    $query = $request->input('query');

    $centres = CentreInscription::where('name', 'LIKE', "%$query%")
        ->orWhere('region_id', 'LIKE', "%$query%")
        ->orWhere('province_id', 'LIKE', "%$query%")
        ->orWhere('pachalik_id', 'LIKE', "%$query%")
        ->orWhere('quartier_id', 'LIKE', "%$query%")
        ->orWhere('avenue_id', 'LIKE', "%$query%")
        ->get();

    return view('centres.search_results', compact('centres'));
}

}

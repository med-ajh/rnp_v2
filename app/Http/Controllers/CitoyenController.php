<?php

namespace App\Http\Controllers;

use App\Models\Citoyen;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Province;
use App\Models\Pachalik;
use App\Models\Quartier;
use App\Models\Avenue;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;




class CitoyenController extends Controller
{
    public function index()
    {
        $citoyens = Citoyen::all();
        return view('citoyens.index', compact('citoyens'));
    }

    public function create()
    {
        $regions = Region::all();
        $provinces = Province::all();
        $pachaliks = Pachalik::all();
        $quartiers = Quartier::all();
        $avenues = Avenue::all();


        return view('citoyens.create', compact('regions', 'provinces', 'pachaliks', 'quartiers', 'avenues'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'email_insc' => 'required|email',
            'nom' => 'required',
            'prenom' => 'required',
            'Cnie' => 'required',
            'date_naissance' => 'required|date',
            'age' => 'numeric',
            'genre' => 'required',
            'status_de_residence' => 'required',
            'ne_au_maroc' => 'required',
            'region_id' => 'required|exists:regions,id',
            'province_id' => 'required|exists:provinces,id',
            'pachalik_id' => 'required|exists:pachaliks,id',
            'quartier_id' => 'required|exists:quartiers,id',
            'avenue_id' => 'required|exists:avenues,id',
            'type_dhabitat' => 'required',
            'n_de_porte' => 'required',
            'adresse' => 'required',
            'code_postal' => 'required',
            'je_dipose_idcs' => 'required',
            'date_expiration' => 'required|date',


            'telephone' => 'required',
        ]);

        $dateOfBirth = Carbon::parse($request->date_naissance);
        $age = $dateOfBirth->age;

        $citoyen = new Citoyen();
        $citoyen->age = $age;
        $citoyen->fill($request->all());
        $citoyen->nidcs = rand(100000, 999999);
        $citoyen->idcs = rand(100000, 999999);
        $citoyen->save();





        $data = [
            'citoyen' => $citoyen,
        ];

        // Render the PDF view
        $html = View::make('citoyens.pdf', $data)->render();

        // Create PDF using Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $pdfContent = $dompdf->output();

        // Return the PDF as a response
        return response($pdfContent)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="citoyen_' . $citoyen->id . '.pdf"');


    }


    public function show(Citoyen $citoyen)
    {
        return view('citoyens.show', compact('citoyen'));
    }

    public function edit(Citoyen $citoyen)
    {
        return view('citoyens.edit', compact('citoyen'));
    }

    public function update(Request $request, Citoyen $citoyen)
    {
        $request->validate([
        ]);

        $citoyen->update($request->all());
        return redirect()->route('citoyens.index')->with('success', 'Citoyen updated successfully.');
    }

    public function destroy(Citoyen $citoyen)
    {
        $citoyen->delete();
        return redirect()->route('citoyens.index')->with('success', 'Citoyen deleted successfully.');
    }

    public function filterProvinces(Request $request)
    {
        $regionId = $request->input('region_id');

        if (!empty($regionId)) {
            $region = Region::find($regionId);
            $provinces = $region->provinces()->pluck('name', 'id')->toArray();
            return response()->json($provinces);
        } else {
            return response()->json([]);
        }
    }

    public function filterPachaliks(Request $request)
    {
        $provinceId = $request->input('province_id');

        if (!empty($provinceId)) {
            $province = Province::find($provinceId);
            $pachaliks = $province->pachaliks()->pluck('name', 'id')->toArray();
            return response()->json($pachaliks);
        } else {
            return response()->json([]);
        }
    }

    public function filterQuartiers(Request $request)
    {
        $pachalikId = $request->input('pachalik_id');

        if (!empty($pachalikId)) {
            $pachalik = Pachalik::find($pachalikId);
            $quartiers = $pachalik->quartiers()->pluck('name', 'id')->toArray();
            return response()->json($quartiers);
        } else {
            return response()->json([]);
        }
    }

    public function filterAvenues(Request $request)
    {
        $quartierId = $request->input('quartier_id');

        if (!empty($quartierId)) {
            $quartier = Quartier::find($quartierId);
            $avenues = $quartier->avenues()->pluck('name', 'id')->toArray();
            return response()->json($avenues);
        } else {
            return response()->json([]);
        }
    }




public function generatePdf(Request $request)
{
    $request->validate([
    ]);

    $html = view('citoyens.create', compact('regions', 'provinces', 'pachaliks', 'quartiers', 'avenues', 'request'))->render();

    $dompdf = new Dompdf();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    // Output the generated PDF (inline or download)
    return $dompdf->stream('citoyen_form.pdf');
}







}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitoyenController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\CentreInscriptionController;



Route::get('/citoyens', [CitoyenController::class, 'index'])->name('citoyens.index');
Route::get('/citoyens/create', [CitoyenController::class, 'create'])->name('citoyens.create');
Route::post('/citoyens', [CitoyenController::class, 'store'])->name('citoyens.store');
Route::get('/citoyens/filterProvinces', [CitoyenController::class, 'filterProvinces'])->name('citoyens.filterProvinces');
Route::get('/citoyens/filterPachaliks', [CitoyenController::class, 'filterPachaliks'])->name('citoyens.filterPachaliks');
Route::get('/citoyens/filterQuartiers', [CitoyenController::class, 'filterQuartiers'])->name('citoyens.filterQuartiers');
Route::get('/citoyens/filterAvenues', [CitoyenController::class, 'filterAvenues'])->name('citoyens.filterAvenues');
Route::post('/citoyens/generate-pdf', 'CitoyenController@generatePDF')->name('citoyens.generatePdf');

Route::get('/citoyens/{citoyen}/pdf', [CitoyenController::class, 'generatePdf'])->name('citoyens.pdf');


Route::post('/filter-provinces', [ReclamationController::class, 'filterProvinces'])->name('filter.provinces');


Route::get('/reclamations/create', [ReclamationController::class, 'create'])->name('reclamations.create');
Route::post('/reclamations', [ReclamationController::class, 'store'])->name('reclamations.store');
Route::get('/reclamations', [ReclamationController::class, 'index'])->name('reclamations.index');
Route::get('/provinces/{regionId}', [ReclamationController::class, 'getProvincesByRegion']);


Route::get('/centres/recherche', 'CentreInscriptionController@rechercherUneCentreDinscription')->name('centres.search');



Route::get('/', function () { return view('index'); });
Route::get('/email', function () { return view('email'); });
Route::get('/support', function () { return view('support'); });
Route::get('/procedure', function () { return view('procedure'); });
Route::get('/question', function () { return view('question'); });
Route::get('/remplir_demand_inscription', function () { return view('remplir_demand_inscription'); });
Route::get('/verification', function () { return view('verification'); });
Route::get('/recheche_centre_inscription', function () { return view('recheche_centre_inscription'); });
Route::get('/recuperation_identi', function () { return view('recuperation_identi'); });
Route::get('/telecharger_idcs', function () { return view('telecharger_idcs'); });
Route::get('/mis', function () { return view('mis'); });
Route::get('/verification_contact', function () { return view('verification_contact'); });
Route::get('/enregistre_reclamation', function () { return view('enregistre_reclamation'); });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

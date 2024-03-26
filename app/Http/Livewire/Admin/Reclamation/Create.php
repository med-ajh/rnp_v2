<?php

namespace App\Http\Livewire\Admin\Reclamation;

use App\Models\Reclamation;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Region;
use App\Models\Province;


class Create extends Component
{
    use WithFileUploads;
    public $type;

    public $titre;
    public $nom_prenom;
    public $email;
    public $telephone;
    public $region_id;
    public $province_id;
    public $descriptif;

    public $regions;
    public $provinces = [];



    protected $rules = [
        'type' => 'required|string|max:255',
        'titre' => 'required|string|max:255',
        'nom_prenom' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'telephone' => 'required|string|max:20',
        'region_id' => 'required|exists:regions,id',
        'province_id' => 'required|exists:provinces,id',
        'descriptif' => 'required|string',
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->validate();

        $reclamation = Reclamation::create([
            'type' => $this->type,
            'titre' => $this->titre,
            'nom_prenom' => $this->nom_prenom,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'region_id' => $this->region_id,
            'province_id' => $this->province_id,
            'descriptif' => $this->descriptif,
            'date_reclamation' => now(),
            'user_id' => auth()->id(),
        ]);

        $this->reset();

        $this->dispatchBrowserEvent('show-message', [
            'type' => 'success',
            'message' => __('CreatedMessage', ['name' => __('Reclamation') ]),
        ]);
    }

    public function render()
    {
        $this->regions = Region::all();
        return view('livewire.admin.reclamation.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Reclamation') ])]);
    }

    public function filterProvinces()
    {
        if (!empty($this->region_id)) {
            $region = Region::find($this->region_id);
            $this->provinces = $region->provinces()->pluck('name', 'id')->toArray();
        } else {
            $this->province_id = null; // Reset province selection
            $this->provinces = []; // Empty province list
        }
    }





}

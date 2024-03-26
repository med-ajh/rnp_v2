<?php

namespace App\Http\Livewire\Admin\Reclamation;

use App\Models\Reclamation;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $reclamation;
    public $titre;
    public $nom_prenom;
    public $email;
    public $telephone;
    public $region_id;
    public $province_id;
    public $descriptif;

    protected $rules = [
        'titre' => 'required|string|max:255',
        'nom_prenom' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'telephone' => 'required|string|max:20',
        'region_id' => 'required|exists:regions,id',
        'province_id' => 'required|exists:provinces,id',
        'descriptif' => 'required|string',
    ];

    public function mount(Reclamation $reclamation)
    {
        $this->reclamation = $reclamation;
        $this->titre = $reclamation->titre;
        $this->nom_prenom = $reclamation->nom_prenom;
        $this->email = $reclamation->email;
        $this->telephone = $reclamation->telephone;
        $this->region_id = $reclamation->region_id;
        $this->province_id = $reclamation->province_id;
        $this->descriptif = $reclamation->descriptif;
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->reclamation->update([
            'titre' => $this->titre,
            'nom_prenom' => $this->nom_prenom,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'region_id' => $this->region_id,
            'province_id' => $this->province_id,
            'descriptif' => $this->descriptif,
        ]);

        $this->dispatchBrowserEvent('show-message', [
            'type' => 'success',
            'message' => __('UpdatedMessage', ['name' => __('Reclamation') ]),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.reclamation.update', [
            'reclamation' => $this->reclamation,
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Reclamation') ])]);
    }
}

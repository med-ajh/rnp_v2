<?php

namespace App\Http\Livewire\Admin\Citoyen;
use Illuminate\Support\Facades\Date;

use App\Models\Citoyen;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Region;
use App\Models\Province;
use App\Models\Pachalik;
use App\Models\Quartier;
use App\Models\Avenue;
use App\Models\Commune;


class Create extends Component
{
    use WithFileUploads;

    public $email_insc;
    public $nom;
    public $prenom;
    public $Cnie;
    public $date_naissance;
    public $age;
    public $genre;
    public $telephone;
    public $nationalite;
    public $status_de_residence;
    public $ne_au_maroc;
    public $region_id;
    public $province_id;
    public $pachalik_id;
    public $quartier_id;
    public $avenue_id;
    public $commune_id;
    public $type_dhabitat;
    public $n_de_porte;
    public $adresse;
    public $code_postal;
    public $je_dipose_idcs;
    public $provinces = [];
    public $pachaliks = [];
    public $quartiers = [];
    public $avenues = [];
    public $communes = [];


    protected $rules = [
        'email_insc' => 'email|unique:citoyens,email_insc',
        'nom' => 'string',
        'prenom' => 'string',
        'Cnie' => 'string|size:8',
        'date_naissance' => 'date|before_or_equal:-18 years|after_or_equal:-120 years',
        'age' => 'integer',
        'genre' => 'string',
        'telephone' => 'string|unique:citoyens,telephone',
        'nationalite' => 'string',
        'status_de_residence' => 'string',
        'ne_au_maroc' => 'string',
        'region_id' => 'exists:regions,id',
        'province_id' => 'exists:provinces,id',
        'pachalik_id' => 'exists:pachaliks,id',
        'quartier_id' => 'exists:quartiers,id',
        'avenue_id' => 'exists:avenues,id',
        'commune_id' => 'exists:communes,id',
        'type_dhabitat' => 'string',
        'n_de_porte' => 'string',
        'adresse' => 'string',
        'code_postal' => 'integer|digits:5',
        'je_dipose_idcs' => 'string',

    ];


    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        $this->age = Date::now()->diffInYears($this->date_naissance);

        $this->validate();

        Citoyen::create($this->modelData());

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Citoyen')])]);

        $this->reset();
    }


    protected function modelData()
    {
        return [
            'email_insc' => $this->email_insc,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'Cnie' => $this->Cnie,
            'date_naissance' => $this->date_naissance,
            'genre' => $this->genre,
            'telephone' => $this->telephone,
            'nationalite' => $this->nationalite,
            'status_de_residence' => $this->status_de_residence,
            'ne_au_maroc' => $this->ne_au_maroc,
            'region_id' => $this->region_id,
            'province_id' => $this->province_id,
            'pachalik_id' => $this->pachalik_id,
            'quartier_id' => $this->quartier_id,
            'avenue_id' => $this->avenue_id,
            'commune_id' => $this->commune_id,
            'type_dhabitat' => $this->type_dhabitat,
            'n_de_porte' => $this->n_de_porte,
            'adresse' => $this->adresse,
            'code_postal' => $this->code_postal,
            'je_dipose_idcs' => $this->je_dipose_idcs,
        ];
    }







    public function updatedDateNaissance($value)
    {
        $this->age = now()->diffInYears($value);
    }


    public function filterProvinces()
    {
        if (!empty($this->region_id)) {
            $region = Region::find($this->region_id);
            $this->provinces = $region->provinces()->pluck('name', 'id')->toArray();
        } else {
            $this->province_id = null;
            $this->provinces = [];
        }
    }

    public function updatedProvinceId($value)
    {
        $this->province_id = $value;

        $this->filterPachaliks();
    }

    public function filterPachaliks()
    {
        if (!empty($this->province_id)) {
            $province = Province::find($this->province_id);
            $this->pachaliks = $province->pachaliks()->pluck('name', 'id')->toArray();
        } else {
            $this->pachaliks = [];
        }
    }

    public function updatedPachalikId($value)
    {
        $this->pachalik_id = $value;

        $this->filterQuartiers();
        $this->filterCommunes();
    }

    public function filterQuartiers()
    {
        if (!empty($this->pachalik_id)) {
            $pachalik = Pachalik::find($this->pachalik_id);
            $this->quartiers = $pachalik->quartiers()->pluck('name', 'id')->toArray();
        } else {
            $this->quartiers = [];
        }
    }

    public function updatedQuartierId($value)
    {
        $this->quartier_id = $value;

        $this->filterAvenues();
    }

    public function filterAvenues()
    {
        if (!empty($this->quartier_id)) {
            $quartier = Quartier::find($this->quartier_id);
            $this->avenues = $quartier->avenues()->pluck('name', 'id')->toArray();
        } else {
            $this->avenues = [];
        }
    }


    public function filterCommunes()
    {
        if (!empty($this->pachalik_id)) {
            $pachalik = Pachalik::find($this->pachalik_id);
            $this->communes = $pachalik->communes()->pluck('name', 'id')->toArray();
        } else {
            $this->communes = [];
        }
    }







}

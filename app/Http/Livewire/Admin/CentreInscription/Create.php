<?php

namespace App\Http\Livewire\Admin\CentreInscription;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\CentreInscription;
use App\Models\Region;
use App\Models\Province;
use App\Models\Pachalik;
use App\Models\Quartier;
use App\Models\Avenue;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $region_id;
    public $province_id;
    public $pachalik_id;
    public $quartier_id;
    public $avenue_id;
    public $provinces = [];
    public $pachaliks = [];
    public $quartiers = [];
    public $avenues = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'region_id' => 'required|exists:regions,id',
        'province_id' => 'required|exists:provinces,id',
        'pachalik_id' => 'required|exists:pachaliks,id',
        'quartier_id' => 'required|exists:quartiers,id',
        'avenue_id' => 'required|exists:avenues,id',
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function mount()
    {
        // Load provinces initially
        $this->filterProvinces();
    }

    public function render()
    {
        $regions = Region::all();

        return view('livewire.admin.centreinscription.create', compact('regions'))
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('CentreInscription') ])]);
    }

    public function create()
    {
        $this->validate();

        CentreInscription::create([
            'name' => $this->name,
            'region_id' => $this->region_id,
            'province_id' => $this->province_id,
            'pachalik_id' => $this->pachalik_id,
            'quartier_id' => $this->quartier_id,
            'avenue_id' => $this->avenue_id,
            'user_id' => auth()->id(),
        ]);

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('CentreInscription') ])]);

        $this->reset();
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

    public function updatedProvinceId($value)
    {
        $this->province_id = $value;

        // Load pachaliks based on the selected province
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
    }

    public function filterQuartiers()
    {
        if (!empty($this->pachalik_id)) {
            $pachalik = Pachalik::find($this->pachalik_id);
            $this->quartiers = $pachalik->quartiers()->pluck('name', 'id')->toArray();
        } else {
            $this->quartiers = []; // Clear quartiers if no pachalik selected
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
            // Fetch avenues associated with the selected quartier
            $quartier = Quartier::find($this->quartier_id);
            $this->avenues = $quartier->avenues()->pluck('name', 'id')->toArray();
        } else {
            $this->avenues = []; // Clear avenues if no quartier selected
        }
    }
}

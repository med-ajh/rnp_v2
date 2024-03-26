<?php

namespace App\Http\Livewire\Admin\CentreInscription;

use App\Models\CentreInscription;
use App\Models\Region;
use App\Models\Province;
use App\Models\Pachalik;
use App\Models\Quartier;
use App\Models\Avenue;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $centreinscription;
    public $provinces = [];
    public $pachaliks = [];
    public $quartiers = [];
    public $avenues = [];

    protected $rules = [
        'centreinscription.name' => 'required',
        'centreinscription.region_id' => 'required',
        'centreinscription.province_id' => 'required',
        'centreinscription.pachalik_id' => 'required',
        'centreinscription.quartier_id' => 'required',
        'centreinscription.avenue_id' => 'required',
    ];

    public function mount(CentreInscription $centreinscription)
    {
        $this->centreinscription = $centreinscription;
        $this->loadProvinces();
        $this->loadQuartiers();
        $this->loadAvenues();
    }

    public function updatedCentreinscriptionRegionId($value)
    {
        $this->centreinscription->province_id = null;
        $this->centreinscription->pachalik_id = null;
        $this->centreinscription->quartier_id = null;
        $this->centreinscription->avenue_id = null;

        $this->loadProvinces();
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('CentreInscription') ]) ]);

        $this->centreinscription->save();

        return redirect()->route(getRouteName().'.centreinscription.read');
    }

    public function render()
    {
        return view('livewire.admin.centreinscription.update', [
            'centreinscription' => $this->centreinscription
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('CentreInscription') ])]);
    }

    private function loadProvinces()
    {
        $region = Region::find($this->centreinscription->region_id);

        if ($region) {
            $this->provinces = $region
                ->provinces()
                ->pluck('name', 'id')
                ->toArray();

            // Check if province ID is set and load pachaliks
            if ($this->centreinscription->province_id) {
                $this->loadPachaliks();
            }
        } else {
            $this->provinces = [];
        }
    }

    private function loadPachaliks()
    {
        if ($this->centreinscription->province_id) {
            $province = Province::find($this->centreinscription->province_id);

            if ($province) {
                $this->pachaliks = $province
                    ->pachaliks()
                    ->pluck('name', 'id')
                    ->toArray();
            } else {
                $this->pachaliks = [];
            }
        } else {
            $this->pachaliks = [];
        }
    }

    private function loadQuartiers()
    {
        if ($this->centreinscription->pachalik_id) {
            $pachalik = Pachalik::find($this->centreinscription->pachalik_id);

            if ($pachalik) {
                $this->quartiers = $pachalik
                    ->quartiers()
                    ->pluck('name', 'id')
                    ->toArray();
            } else {
                $this->quartiers = [];
            }
        } else {
            $this->quartiers = [];
        }
    }

    private function loadAvenues()
    {
        if ($this->centreinscription->quartier_id) {
            $quartier = Quartier::find($this->centreinscription->quartier_id);

            if ($quartier) {
                $this->avenues = $quartier
                    ->avenues()
                    ->pluck('name', 'id')
                    ->toArray();
            } else {
                $this->avenues = [];
            }
        } else {
            $this->avenues = [];
        }
    }
}

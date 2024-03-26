<?php
namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use App\Models\Pachalik; // Import the Pachalik model
use App\Models\Province;

class PachalikComponent implements CRUDComponent
{
    public $create = true;
    public $delete = true;
    public $update = true;
    public $with_user_id = false;
    public $provinceOptions;

    public function mount()
    {
        $this->provinceOptions = Province::pluck('name', 'id')->toArray();
    }

    public function render()
    {
        $provinceOptions = Province::pluck('name', 'id')->toArray();
        return view('livewire.admin.provinces.create', compact('provinceOptions'));
    }

    public function getModel()
    {
        return Pachalik::class;
    }

    public function fields()
    {
        return ['name', 'province_id'];
    }

    public function searchable()
    {
        return ['name'];
    }

    public function inputs()
    {
        $provinceOptions = getCrudConfig('pachalik')->inputs()['province_id']['select'];
        return [
            'name' => 'text',
            'province_id' => ['select', 'options' => $provinceOptions],
        ];
    }

    public function validationRules()
    {
        return [
            'name' => 'required',
            'province_id' => 'required|exists:provinces,id', 
        ];
    }

    public function storePaths()
    {
        return [];
    }
}

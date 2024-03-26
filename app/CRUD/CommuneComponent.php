<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Commune;
use App\Models\Pachalik;



class CommuneComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;
    public $with_user_id = false;
    public $pachalikOptions;

    public function mount()
    {
        $this->pachalikOptions = Pachalik::pluck('name', 'id')->toArray();
    }

    public function render()
    {
        $pachalikOptions = Pachalik::pluck('name', 'id')->toArray();
        return view('livewire.admin.provinces.create', compact('pachalikOptions'));
    }

    public function getModel()
    {
        return Commune::class; // Return the Pachalik model
    }

    public function fields()
    {
        return ['name', 'pachalik_id'];
    }

    public function searchable()
    {
        return ['name'];
    }

    public function inputs()
    {
        $pachalikOptions = getCrudConfig('commune')->inputs()['pachalik_id']['select'];
        return [
            'name' => 'text',
            'pachalik_id' => ['select', 'options' => $pachalikOptions],
        ];
    }

    public function validationRules()
    {
        return [
            'name' => 'required',
            'pachalik_id' => 'required|exists:provinces,id',
        ];
    }

    public function storePaths()
    {
        return [];
    }
}

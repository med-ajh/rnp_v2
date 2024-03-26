<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Avenue;
use App\Models\Quartier;


class AvenueComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;
    public $with_user_id = false;
    public $quartierOptions;

    public function mount()
    {
        $this->quartierOptions = Quartier::pluck('name', 'id')->toArray();
    }

    public function render()
    {
        $quartierOptions = Quartier::pluck('name', 'id')->toArray();
        return view('livewire.admin.provinces.create', compact('quartierOptions'));
    }

    public function getModel()
    {
        return Avenue::class;
    }

    public function fields()
    {
        return ['name', 'quartier_id'];
    }

    public function searchable()
    {
        return ['name'];
    }

    public function inputs()
    {
        $quartierOptions = getCrudConfig('avenue')->inputs()['quartier_id']['select'];
        return [
            'name' => 'text',
            'quartier_id' => ['select', 'options' => $quartierOptions],
        ];
    }

    public function validationRules()
    {
        return [
            'name' => 'required',
            'quartier_id' => 'required|exists:quartier,id',
        ];
    }

    public function storePaths()
    {
        return [];
    }
}

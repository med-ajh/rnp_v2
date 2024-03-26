<?php
namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use App\Models\Province;
use App\Models\Region;

class ProvinceComponent implements CRUDComponent
{
    public $create = true;
    public $delete = true;
    public $update = true;
    public $with_user_id = false;
    public $regionOptions;

    public function mount()
    {
        $this->regionOptions = Region::pluck('name', 'id')->toArray();
    }
    public function render()
    {
        $regionOptions = Region::pluck('name', 'id')->toArray();
        return view('livewire.admin.provinces.create', compact('regionOptions'));
    }

    public function getModel()
    {
        return Province::class;
    }

    public function fields()
    {
        return ['name', 'region_id'];
    }

    public function searchable()
    {
        return ['name'];
    }

    // ProvinceComponent.php

public function inputs()
{
    $regionOptions = getCrudConfig('province')->inputs()['region_id']['select'];
    return [
        'name' => 'text',
        'region_id' => ['select', 'options' => $regionOptions],
    ];
}


    public function validationRules()
    {
        return [
            'name' => 'required',
            'region_id' => 'required|exists:regions,id',
        ];
    }

    public function storePaths()
    {
        return [];
    }
}

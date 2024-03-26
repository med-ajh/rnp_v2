<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\CentreInscription;
use App\Models\Region;
use App\Models\Province;
use App\Models\Pachalik;
use App\Models\Quartier;
use App\Models\Avenue;

class CentreInscriptionComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    public function getModel()
    {
        return CentreInscription::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['name', 'region_id', 'province_id', 'pachalik_id', 'quartier_id', 'avenue_id'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['name'];
    }

    // Define input fields for create and update actions
    public function inputs()
    {
        return [
            'name' => 'text',
            'region_id' => ['select', 'options' => Region::pluck('name', 'id')->toArray()],
            'province_id' => ['select', 'options' => Province::pluck('name', 'id')->toArray()],
            'pachalik_id' => ['select', 'options' => Pachalik::pluck('name', 'id')->toArray()],
            'quartier_id' => ['select', 'options' => Quartier::pluck('name', 'id')->toArray()],
            'avenue_id' => ['select', 'options' => Avenue::pluck('name', 'id')->toArray()],
        ];
    }

    // Validation rules for create and update actions
    public function validationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            'province_id' => 'required|exists:provinces,id',
            'pachalik_id' => 'required|exists:pachaliks,id',
            'quartier_id' => 'required|exists:quartiers,id',
            'avenue_id' => 'required|exists:avenues,id',
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}

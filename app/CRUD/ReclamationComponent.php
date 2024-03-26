<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Reclamation;

class ReclamationComponent implements CRUDComponent
{
    public $create = true;
    public $delete = true;
    public $update = true;
    public $with_user_id = true;

    public function getModel()
    {
        return Reclamation::class;
    }

    public function fields()
    {
        return ['type','titre', 'nom_prenom', 'email', 'telephone', 'descriptif'];
    }

    public function searchable()
    {
        return ['type','titre', 'nom_prenom', 'email', 'telephone', 'descriptif'];
    }

    public function inputs()
    {
        return [];
    }

    public function validationRules()
    {
        return [
            'type' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'nom_prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telephone' => 'required|string|max:20',
            'region_id' => 'required|exists:regions,id',
            'province_id' => 'required|exists:provinces,id',
            'descriptif' => 'required|string',
        ];
    }

    public function storePaths()
    {
        return [];
    }
}

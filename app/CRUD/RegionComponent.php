<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Region;

class RegionComponent implements CRUDComponent
{
    public $create = true;
    public $delete = true;
    public $update = true;
    public $with_user_id = false;

    public function getModel()
    {
        return Region::class;
    }

    public function fields()
    {
        return ['name'];
    }

    public function searchable()
    {
        return ['name'];
    }

    public function inputs()
    {
        return [
            'name'=> 'text'
        ];
    }

    public function validationRules()
    {
        return [
            'name'=> 'required'
        ];
    }

    public function storePaths()
    {
        return [];
    }
}

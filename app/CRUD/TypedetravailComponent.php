<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Typedetravail;

class TypedetravailComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;


    public $with_user_id = true;

    public function getModel()
    {
        return Typedetravail::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['name'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['name'];
    }

    
    public function inputs()
    {
        return [
                'name'=> 'text'];}


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

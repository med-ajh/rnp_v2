<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Secteurdetravail;
use App\Models\Typedetravail;


class SecteurdetravailComponent implements CRUDComponent
{
    public $create = true;
    public $delete = true;
    public $update = true;
    public $with_user_id = false;
    public $typedetravailOptions;

    public function mount()
    {
        $this->typedetravailOptions = Typedetravail::pluck('name', 'id')->toArray();
    }
    public function render()
    {
        $typedetravailOptions = Typedetravail::pluck('name', 'id')->toArray();
        return view('livewire.admin.typedetravail.create', compact('typedetravailOptions'));
    }


    public function getModel()
    {
        return Secteurdetravail::class;
    }

    public function fields()
    {
        return ['name','typedetravail_id'];
    }

    public function searchable()
    {
        return ['name'];
    }


    public function inputs()
    {
        return [];
    }

    public function validationRules()
    {
        $typedetravailOptions = getCrudConfig('secteurdetravail')->inputs()['typedetravail_id']['select'];
        return [
            'name' => 'text',
            'typedetravail_id' => ['select', 'options' => $typedetravailOptions],
        ];
    }

    public function storePaths()
    {
        return [];
    }
}

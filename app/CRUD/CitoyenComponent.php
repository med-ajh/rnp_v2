<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Citoyen;

class CitoyenComponent implements CRUDComponent
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
        return Citoyen::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['email_insc', 'nom', 'prenom', 'Cnie', 'date_naissance', 'age', 'genre', 'nationalite', 'ne_au_maroc', 'type_dhabitat', 'n_de_porte', 'adresse', 'code_postal', 'telephone', 'email', 'type_de_tuteur', 'prenom_du_tuteur', 'nom_du_tuteur', 'date_expiration', 'lien_parente', 'score'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['email_insc', 'nom', 'prenom', 'Cnie', 'date_naissance', 'age', 'genre', 'nationalite', 'ne_au_maroc', 'type_dhabitat', 'n_de_porte', 'adresse', 'code_postal', 'telephone', 'email', 'type_de_tuteur', 'prenom_du_tuteur', 'nom_du_tuteur', 'date_expiration', 'lien_parente', 'score'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}

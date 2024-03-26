<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citoyen extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_insc',
        'nom',
        'prenom',
        'Cnie',
        'date_naissance',
        'age',
        'genre',
        'status_de_residence',
        'ne_au_maroc',
        'region_id',
        'province_id',
        'pachalik_id',
        'quartier_id',
        'avenue_id',
        'type_dhabitat',
        'n_de_porte',
        'adresse',
        'code_postal',
        'je_dipose_idcs',
        'date_expiration',
        'telephone',
        'email',
        'nidcs',
        'idcs',
    ];


    public static function boot()
    {
        parent::boot();

        static::creating(function ($citoyen) {
            $citoyen->nidcs = rand(100000, 999999);
            $citoyen->idcs = rand(100000, 999999);
        });
    }

    public function region()
    {
        return $this->belongsTo(Region::class)->withDefault();
    }

    public function province()
    {
        return $this->belongsTo(Province::class)->withDefault();
    }

    public function pachalik()
    {
        return $this->belongsTo(Pachalik::class)->withDefault();
    }

    public function quartier()
    {
        return $this->belongsTo(Quartier::class)->withDefault();
    }

    public function avenue()
    {
        return $this->belongsTo(Avenue::class)->withDefault();
    }


}



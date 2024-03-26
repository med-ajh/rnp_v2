<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pachalik extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'province_id'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function quartiers()
{
    return $this->hasMany(Quartier::class);
}

public function communes()
{
    return $this->hasMany(Commune::class);
}




}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quartier extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'pachalik_id'];

    public function pachalik()
    {
        return $this->belongsTo(Pachalik::class);
    }

    public function avenues()
    {
        return $this->hasMany(Avenue::class);
    }

    
}

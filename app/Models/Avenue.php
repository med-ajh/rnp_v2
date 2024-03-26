<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avenue extends Model
{
    use HasFactory;

    protected $fillable = ['quartier_id', 'name'];

    public function quartier()
    {
        return $this->belongsTo(Quartier::class);
    }
}

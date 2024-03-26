<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secteurdetravail extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'typedetravail_id'];

    public function typedetravail()
    {
        return $this->belongsTo(Typedetravail::class);
    }
}

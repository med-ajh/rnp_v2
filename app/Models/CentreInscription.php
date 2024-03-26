<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentreInscription extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'region_id', 'province_id', 'pachalik_id', 'quartier_id', 'avenue_id'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function pachalik()
    {
        return $this->belongsTo(Pachalik::class);
    }

    public function quartier()
    {
        return $this->belongsTo(Quartier::class);
    }

    public function avenue()
    {
        return $this->belongsTo(Avenue::class);
    }
}

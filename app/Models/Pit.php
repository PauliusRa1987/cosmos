<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pit extends Model
{
    use HasFactory;
    public function getCountryInfo()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
  
    public function ships()
    {
        return $this->belongsToMany(Ship::class);
    }
}

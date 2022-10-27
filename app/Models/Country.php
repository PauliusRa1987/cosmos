<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public function hasPits()
    {
        return $this->hasMany(Pit::class, 'country_id', 'id');
    }
    public function countCapacity()
    {
        return $this->hasMany(Pit::class)->selectRaw('pits.country_id,SUM(pits.capacity) as total')->groupBy('pits.country_id');
    }
    public function hasShips()
    {
        return $this->hasMany(Ship::class, 'country_id', 'id');
    }
    public function getUnionInfo()
    {
        return $this->belongsTo(Union::class, 'union_id', 'id');
    }
}

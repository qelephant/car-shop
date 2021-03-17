<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AutoAd;

class Transmission extends Model
{
    use HasFactory;

    public function autoads()
    {
        return $this->hasMany(CarAd::class);
    }
}

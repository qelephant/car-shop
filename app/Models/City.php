<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CarAd;

class City extends Model
{
    use HasFactory;

    public function carAds()
    {
        $this->hasMany(CarAd::class);
    }
}

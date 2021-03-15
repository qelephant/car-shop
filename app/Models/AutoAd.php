<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\Body;
use App\Models\Transmission;
use App\Models\Wheel;
use App\Models\Drive;

class AutoAd extends Model
{
    use HasFactory;

    public function city()
    {
        $this->belongsTo(City::class);
    }

    public function body()
    {
        $this->belongsTo(Body::class);
    }

    public function transmission()
    {
        $this->belongsTo(Transmission::class);
    }

    public function wheel()
    {
        $this->belongsTo(Wheel::class);
    }

    public function drive()
    {
        $this->belongsTo(Drive::class);
    }
}

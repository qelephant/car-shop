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

    /**
    * The table associated with the model.
    *
    * @var string
    */

    protected $table = 'car_ads';

    protected $fillable = [
        'name',
        'price',
        'color',
        'description',
        'engine_volumne',
        'city_id',
        'body_id',
        'transmission_id',
        'wheel_id',
        'drive_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function body()
    {
        return $this->belongsTo(Body::class);
    }

    public function transmission()
    {
        return $this->belongsTo(Transmission::class);
    }

    public function wheel()
    {
        return $this->belongsTo(Wheel::class);
    }

    public function drive()
    {
        return $this->belongsTo(Drive::class);
    }
}

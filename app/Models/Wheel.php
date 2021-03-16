<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AutoAd;

class Wheel extends Model
{
    use HasFactory;

    public function autoads()
    {
        return $this->hasMany(AutoAd::class);
    }
}

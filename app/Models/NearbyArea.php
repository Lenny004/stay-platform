<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NearbyArea extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nearby_area',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelStatus extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'hotel_status';

    protected $fillable = [
        'status',
    ];
}

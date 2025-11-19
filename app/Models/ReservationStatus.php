<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationStatus extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'reservation_status';

    protected $fillable = [
        'reservation_status',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'payment_status';

    protected $fillable = [
        'payment_status',
    ];
}

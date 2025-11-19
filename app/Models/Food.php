<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    /**
     * Laravel treats "food" as uncountable, so we need to specify the table name explicitly.
     */
    protected $table = 'foods';

    public $timestamps = false;

    protected $fillable = [
        'food',
    ];
}

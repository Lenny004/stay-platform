<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['country_name', 'country_code'];
}
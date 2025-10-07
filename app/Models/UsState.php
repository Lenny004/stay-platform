<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsState extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['state_code', 'state_name'];
}
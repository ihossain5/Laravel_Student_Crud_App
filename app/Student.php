<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    Use SoftDeletes;

    protected $fillable = [
        'name', 'email','phone_number'
    ];
}


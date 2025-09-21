<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cemetery extends Model
{
    protected $fillable = [
        'name',
        'address',
        'status',
        'latitude',
        'longitude',
    ];
}

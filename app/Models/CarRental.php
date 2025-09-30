<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarRental extends Model
{
    protected $fillable = [
        'cemetery_id',
        'requester_name',
        'phone',
        'is_intercity',
        'pickup_address',
        'destination_address',
        'status',
    ];
}

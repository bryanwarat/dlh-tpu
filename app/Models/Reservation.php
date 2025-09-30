<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'deceased_id',
        'heir_id',
        'religion_id',
        'cemetery_id',
        'burial_type', // Biasa atau Tumpang
        'status', // Default: 0 (Menunggu)
    ];
}

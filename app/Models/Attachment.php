<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'reservation_id',
        'deceased_ktp',
        'heir_ktp',
        'death_certificate',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Heir extends Model
{
    protected $fillable = [
        'district_id',
        'subdistrict_id',
        'name',
        'ktp',
        'email',
        'phone',
        'occupation', // Sesuai dengan input 'heir_job' di form
        'address',
    ];
}

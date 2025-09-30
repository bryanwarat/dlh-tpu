<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deceased extends Model
{
    protected $fillable = [
        'district_id', 
        'subdistrict_id', 
        'name', 
        'ktp', 
        'gender', // 1=Laki-laki (atau L), 2=Perempuan (atau P)
        'place_of_birth', 
        'date_of_birth', 
        'date_of_death', 
        'burial_date', 
        'address',
    ];
}

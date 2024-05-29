<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasDestination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_destinations',
        'wifi',
        'parkir_destination',
        'ac_destination',
        'kolam_destination',
        'rated_wisata',
    ];
}

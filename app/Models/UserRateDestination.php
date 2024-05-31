<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRateDestination extends Model
{
    use HasFactory;


    protected $fillable = [
        'id_user',
        "id_destinations",
        'name',
        'rating_destination',
        'comment_destination',
        'id_artikel_destinations',
        'rating_artikel_destination',
        'comment_artikel_destination',
        'id_event_destinations',
        'rating_event_destination',
        'comment_event_destination',
    ];
}

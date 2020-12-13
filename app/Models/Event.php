<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        '',
        'name_event',
        'description',
        'event_date',
        'place',
        'event_link',
        'event_type',
        'picture',
        'id_club',
        'authorized',
        'published',
    ];
}

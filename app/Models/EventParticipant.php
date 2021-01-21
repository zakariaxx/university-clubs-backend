<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        '',
        'event_id',
        'participant_id',
        'invitation',
        'participate',
        'first_name',
        'last_name',
        'email',
        'phone_number'
    ];
}

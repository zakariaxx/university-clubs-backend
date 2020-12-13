<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        '',
        'invitation',
        'participate',
        'last_name',
        'email',
        'phone_number'
    ];
}

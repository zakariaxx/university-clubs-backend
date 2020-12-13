<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'object',
        'meeting_date',
        'meeting_time',
        'participant_list',
        'link',
        'location',
        'repeat',
        'creatby',
    ];

}

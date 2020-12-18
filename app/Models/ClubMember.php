<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubMember extends User
{
    use HasFactory;

    protected $fillable=[
        'student_number',
        'hometown',
        'study',
        'level_of_study',
        'campus_residence',
        'subscription_date',
        'position_held',
        'center_of_interest',
        'faculty',

    ];


}

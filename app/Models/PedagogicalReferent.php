<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedagogicalReferent extends User
{
    use HasFactory;

    protected $fillable =
        [

        'administrative_officer',

        'professor',

        'faculty_or_department',

        'email_uir',

        'pedagogical_referent',

        ];

}

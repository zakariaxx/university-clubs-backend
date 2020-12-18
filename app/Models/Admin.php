<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    use HasFactory;

    protected $fillable= [

        'administrative_officer',
        'professor',
        'admin',
        'email_uir',
        'faculty_or_department',
    ];

}

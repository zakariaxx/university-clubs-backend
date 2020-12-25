<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    use HasFactory;
    protected $table = 'admin';

    public function users()
    {
        return $this->hasOne(User::class,'id','id_user');
    }

    protected $fillable= [

        'administrative_officer',
        'professor',
        'admin',
        'email_uir',
        'faculty_or_department',
    ];

}

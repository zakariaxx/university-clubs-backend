<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    const OFFICE_MEMBER = 'true';
    const NORMAL_MEMBER = 'false';


    protected $fillable = [
        '',
        'id_user',
        'id_club',
        'role_name',
        'office_member',
        'inscription_date',
        'active',
    ];

    public function isOfficeMember(){
        return $this->office_member = $this::OFFICE_MEMBER;
    }

}

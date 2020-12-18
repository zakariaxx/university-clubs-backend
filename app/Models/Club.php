<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Club extends Model
{
    use HasFactory;

    use  Notifiable,HasFactory;

    protected $fillable = [
        '',
        'club_name',
        'description',
        'email',
        'club_type',
        'creation_date',
        'club_logo',
        'mission_objectives',
        'office_member_list_file',
        'signalitic_file',
        'constitution_file',
        'activate',
        'caisse',
        'logo'
    ];
}

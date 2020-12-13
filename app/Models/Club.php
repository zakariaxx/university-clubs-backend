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
        'logo',
        'pedagogique_referent',
        'fiche_signalitique',
        'caisse',
    ];
}

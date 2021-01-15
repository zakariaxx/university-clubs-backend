<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubEvaluation extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'club_name',
        'score',
        'date',
        'decision',
        'evaluation',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        '',
        'name_event',
        'theme',
        'description',
        'event_date',
        'event_time',
        'location',
        'target_population',
        'needs_for_realization',
        'estimated_budget',
        'communication_needs',
        'clubs_involved',
        'sponsors',
        'expected_benefits',
        'club_name',
        'pre_event_file',
        'made_by',
        'submit_by',
        'published',
        'academic_year',
        'event_link',
        'picture',

    ];
}

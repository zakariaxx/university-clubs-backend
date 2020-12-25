<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearActionPlan extends Model
{
    use HasFactory;

    protected $fillable =[
    'event_name',
    'description',
    'location',
    'academic_year',
    'estimated_budget',
    'event_date',
    'event_time',
    'id_club',
    ];
}

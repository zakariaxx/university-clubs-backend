<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    const SENT = 'sent';
    const RECEIVED = 'received';
    const READ = 'read';
    use HasFactory;

    protected $fillable = [
        'message',
        'sent_date',
        'status'
    ];
}

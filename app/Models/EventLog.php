<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventLog extends Model
{
    use HasFactory;
    protected $table = 'event_log';
    protected $fillable = [
        'event_id',
        'event_name',
        'date',
        'start_date',
        'end_date'
    ];
}

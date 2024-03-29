<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table =  'appointments';
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'specialist',
        'appointment_date',

    ];
}

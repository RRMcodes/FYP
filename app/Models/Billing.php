<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Billing extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'billings';
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'date',
        'transaction_amount',
        'transaction'
    ];
}

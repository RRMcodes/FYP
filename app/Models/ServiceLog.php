<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceLog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='service_logs';
    protected $fillable = [
        'billing_id',
        'service_id',
    ];
}

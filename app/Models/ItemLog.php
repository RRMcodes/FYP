<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use mysql_xdevapi\Table;

class ItemLog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='item_logs';
    protected $fillable = [
        'billing_id',
        'item_name',
        'quantity'
    ];
}


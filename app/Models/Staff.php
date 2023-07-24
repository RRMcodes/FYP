<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'staff';
    protected $fillable = [
        "f_name" ,
        "l_name" ,
        "address" ,
        "email" ,
        "contact_number",
        "dob" ,
        "gender",
        "position",
        "status",
        "experience",
        "start_date",
        "end_date",
    ];

    public function getFullName()
    {
        return "{$this->f_name} {$this->l_name}";
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'doctors';
    protected $fillable = [
        "id",
        "f_name" ,
        "l_name" ,
        "address" ,
        "email" ,
        "contact_number",
        "dob" ,
        "gender",
        "specialization",
        "status",
        "experience",
        "start_date",
        "end_date",
        "schedule"
    ];

    public function getFullName()
    {
        return "{$this->f_name} {$this->l_name}";
    }
}

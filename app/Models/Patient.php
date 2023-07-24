<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "patient";
    protected $fillable = [
        "f_name" ,
        "l_name" ,
         "address" ,
         "email" ,
         "contact_number" ,
         "dob" ,
         "blood_group" ,
         "gender"
    ];

    public function getFullName()
    {
        return "{$this->f_name} {$this->l_name}";
    }
}

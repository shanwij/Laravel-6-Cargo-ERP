<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'firstName',
        'lastName',
        'gender',
        'dob',
        'email',
        'position',
        'dept',
        'phoneNo',
        'address',
        'workStart'       
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'date',
        'details',
        'amount',
        'bank',
        'due_date',
        'status'     
    ];
}

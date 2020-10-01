<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $table = 'notes';
    protected $fillable = [
        'Date',
        'Notes',
        'description',
        'Todo_Due_Date',
        'Contact',
        'Task_Status',
        'Task_Update',
        'Sales_Rep',
        'cus_id'
    ];

    public function contact()
    {
        return $this->belongsTo('App\Contact','cus_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    
    protected $fillable = [
        'Contact_First',
        'Contact_Last',
        'Email',
        'Phone',
        'Contact_Title',
        'Date_of_Initial_Contact',
        'Title',
        'Company',
        'Address',
        'Address_Street_1',
        'Address_City',
        'Address_State',
        'Address_Zip',
        'Address_Country',
        'Status',    
        'Sales_Rep',
        'Project_Type',
        'Project_Description',
        'Proposal_Due_Date', 
        'Budget'      
    ];

    public function notes()
    {
        return $this->hasMany(Notes::class); 
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loading extends Model
{
    protected $fillable = [
        'shipper',
        'contactNo',
        'loadingDate',
        'pickupDate',
        'loadingAdd',
        'loadingNum',
        'dCompanyName',
        'dAddress',
        'dPerson',
        'dNumber',
        'invoiceNo',
        'bookingNo',
        'conName',
        'conAddress',
        'conPhone',
        'oceanVess',
        'oceanDate',
        'shipPort',
        'delPort',
        'invoiceDate',
        'containerNo'
    ];
}
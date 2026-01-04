<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    

    protected $fillable = [
        'date',
        'customer_name',
        'locality',
        'contact_no',
        'alt_contact_no',
        'requirement',
        'mode',
    ];
}
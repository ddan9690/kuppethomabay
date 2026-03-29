<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCounty extends Model
{
     protected $fillable = [
        'full_name',
        'sub_county_id',
        'tsc_no',
        'phone',
        'branch',
        'agency_fee_active',
    ];

   
   
}

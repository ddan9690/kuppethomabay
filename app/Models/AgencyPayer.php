<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgencyPayer extends Model
{
    protected $fillable = [
        'full_name',
        'sub_county_id',
        'tsc_no',
        'phone',
    ];

     public function subCounty()
    {
        return $this->belongsTo(SubCounty::class);
    }
}

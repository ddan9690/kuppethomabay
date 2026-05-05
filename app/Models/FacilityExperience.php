<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacilityExperience extends Model
{
    protected $fillable = [
        'sub_county_id',
        'facility_name',
        'details',
    ];

    /**
     * Relationship: Sub County
     */
    public function subCounty()
    {
        return $this->belongsTo(SubCounty::class);
    }
}

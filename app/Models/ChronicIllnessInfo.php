<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChronicIllnessInfo extends Model
{
    use HasFactory;

    protected $table = 'chronic_illness_infos';

    protected $fillable = [
        'sub_county_id',
        'affected_party',
        'experience_description',
    ];

    public function subCounty()
    {
        return $this->belongsTo(SubCounty::class, 'sub_county_id');
    }
}
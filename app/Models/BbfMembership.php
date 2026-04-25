<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BbfMembership extends Model
{

    protected $table = 'bbf_memberships';

    protected $fillable = [
        'full_name',
        'tsc_number',
        'phone_number',
        'national_id',
        'email',
        'gender',
        'school_name',
        'sub_county_id',
        'zone',
        'category',
        'year_posting',
        'nok_full_name',
        'nok_relationship',
        'nok_phone',
        'spouse_full_name', // JSON array of spouses
        'spouse_id',        // optional, kept for backward compatibility
        'spouse_phone',     // optional, kept for backward compatibility
        'children',         // JSON array of children
        'father_name',
        'father_status',
        'father_id',
        'mother_name',
        'mother_status',
        'mother_id',
        'status',
        'approval_reason',
        'approved_by',
        'approved_at',
    ];

    // Cast JSON fields automatically
    protected $casts = [
        'spouse_full_name' => 'array', // will store array of spouses
        'children' => 'array',
        'approved_at' => 'datetime',
    ];

   public function subCounty()
    {
        return $this->belongsTo(SubCounty::class, 'sub_county_id');
    }
}

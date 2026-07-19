<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YouthfulTeacher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'tsc_number',
        'phone_number',
        'sub_county_id',
        'age_bracket',
        'teaching_level',
        'teaching_subject_1',
        'teaching_subject_2',
        'employment_status',
        'years_in_service',
        'has_undertaken_training',
        'interested_activities',
        'beneficial_trainings',
        'consent',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'interested_activities' => 'array',
        'beneficial_trainings' => 'array',
        'has_undertaken_training' => 'boolean',
        'consent' => 'boolean',
    ];

    /**
     * Get the sub-county associated with the teacher.
     */
    public function subCounty()
    {
        return $this->belongsTo(SubCounty::class, 'sub_county_id');
    }
}
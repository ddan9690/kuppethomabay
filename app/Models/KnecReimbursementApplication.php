<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KnecReimbursementApplication extends Model
{
    use HasFactory;

    protected $table = 'knec_reimbursement_applications';

    protected $fillable = [
        'announcement_id',
        'full_name',
        'id_number',
        'tsc_number',
        'phone_number',
        'gender',
        'sub_county_id',
        'school',
        'level',
        'date_of_training',
        'training_center',
        'subject',
        'paper',
        'status',
        'remarks',
        'updated_by',
    ];

    public function announcement(): BelongsTo
    {
        return $this->belongsTo(KnecReimbursementAnnouncement::class, 'announcement_id');
    }

    public function subCounty(): BelongsTo
    {
        return $this->belongsTo(SubCounty::class);
    }

    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
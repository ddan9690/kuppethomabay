<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KnecReimbursementAnnouncement extends Model
{
    use HasFactory;

    protected $table = 'knec_reimbursement_announcements';

    protected $fillable = [
        'year',
        'level',
        'title',
        'slug',
        'announced_on',
        'is_active',
        'status',
    ];

    protected $casts = [
        'announced_on' => 'date',
        'is_active' => 'boolean',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(KnecReimbursementApplication::class, 'announcement_id');
    }
}
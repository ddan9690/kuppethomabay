<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubCounty;
use Spatie\LaravelCipherSweet\Contracts\CipherSweetEncrypted;
use Spatie\LaravelCipherSweet\Concerns\UsesCipherSweet;
use ParagonIE\CipherSweet\EncryptedRow;
use ParagonIE\CipherSweet\BlindIndex;

class BbfMembership extends Model implements CipherSweetEncrypted
{
    use UsesCipherSweet;

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

        'spouse_full_name',
        'spouse_id',
        'spouse_phone',
        'children',

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

    protected $casts = [
        'spouse_full_name' => 'array',
        'children' => 'array',
        'approved_at' => 'datetime',
    ];

    /**
     * 🔐 CipherSweet Encryption Configuration
     */
   public static function configureCipherSweet(EncryptedRow $encryptedRow): void
{
    $encryptedRow
        /**
         * 🔐 REQUIRED fields (must never be NULL)
         */
        ->addField('tsc_number')
        ->addField('phone_number')

        /**
         * 🔐 OPTIONAL fields (NULL allowed) — FIX FOR YOUR ERROR
         */
        ->addOptionalTextField('national_id')
        ->addOptionalTextField('email')
        ->addOptionalTextField('nok_full_name')
        ->addOptionalTextField('nok_phone');

    $encryptedRow
        /**
         * 🔎 Blind indexes
         */
        ->addBlindIndex('tsc_number', new BlindIndex('tsc_index'))
        ->addBlindIndex('phone_number', new BlindIndex('phone_index'))
        ->addBlindIndex('national_id', new BlindIndex('nid_index'))
        ->addBlindIndex('email', new BlindIndex('email_index'))
        ->addBlindIndex('nok_phone', new BlindIndex('nok_phone_index'));
}
    /**
     * Relationships
     */
    public function subCounty()
    {
        return $this->belongsTo(SubCounty::class, 'sub_county_id');
    }
}
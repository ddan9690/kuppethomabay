<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DocumentUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file_path',
        'category',
    ];

    protected static function booted(): void
    {
        static::deleting(function (DocumentUpload $document) {
            if ($document->file_path && Storage::disk('public')->exists($document->file_path)) {
                Storage::disk('public')->delete($document->file_path);
            }
        });
    }
}
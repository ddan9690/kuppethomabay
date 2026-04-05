<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'body',
        'image',       // optional
        'visibility'
    ];

    /**
     * Boot method to auto-generate slug
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            $news->slug = Str::slug($news->title);
        });
    }

    /**
     * Dynamic excerpt (no DB column needed)
     */
    public function getExcerptAttribute()
    {
        return Str::words(strip_tags($this->body), 20, '...');
    }

    /**
     * Optional: dynamic accessor for image URL
     * Returns null if no image exists
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
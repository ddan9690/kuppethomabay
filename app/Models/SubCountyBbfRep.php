<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCountyBbfRep extends Model
{
     protected $fillable = ['user_id', 'sub_county_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subCounty()
    {
        return $this->belongsTo(SubCounty::class);
    }
}

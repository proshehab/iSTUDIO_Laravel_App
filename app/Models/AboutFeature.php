<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutFeature extends Model
{
    protected $fillable = [
        'about_id',
        'icon',
        'title'
    ];

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
